<?php

namespace App\AppTrait;

use App\Models\Core\Image;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as ImageIntervention;
use Throwable;

trait FileTrait
{
    /**
     * @var string
     */
    private static $base_dir = 'app/public/'; //uploads folder located inside storage/app/public/uploads

    /**
     * image upload Method
     * @param $request
     * @param string $fileName
     * @param string $path
     * @param string $prefix
     * @param string $uniqueIdentifier
     * @return string
     * @throws Throwable
     */
    public function imageUpload($request, string $fileName, string $path, string $prefix = 'img_', string $uniqueIdentifier = '', $product = null)
    {

    
        $file = $request->file($fileName);
        $extension = $file->getClientOriginalExtension();
        $fileName = $this->generateRandomString(25);
        $name = $prefix . $uniqueIdentifier . '_' . time() . '-' . $fileName . '.' . $extension;
        $mainPath = 'file/images/media/' . $path . '/';
        $uploadDir = self::$base_dir . $mainPath;


        if (!File::exists($uploadDir)) {
            File::makeDirectory(storage_path($uploadDir), 0777, true, true);
        }

        $destinationPath = storage_path($uploadDir);
        $imageObject = ImageIntervention::make($file);
        $imageObject->save($destinationPath . $name);
        $size = getimagesize($file);
        list($width, $height, $type, $attr) = $size;
        $uploadedString = 'storage/' . $mainPath . $name;
        $AllImagesSettingData = $this->AllimagesHeightWidth();
        $categoryImage = [];
        if ($product==true){
            switch (true) {

                case ($width >= $AllImagesSettingData[5] || $height >= $AllImagesSettingData[4]):
                    $categoryImage[] = $this->storeThumbnial($destinationPath, $name, $mainPath, $file);
                    $categoryImage[] = $this->storeMedium($destinationPath, $name, $mainPath, $file);
                    $categoryImage[] = $this->storeLarge($destinationPath, $name, $mainPath, $file);
                    break;
                case ($width >= $AllImagesSettingData[3] || $height >= $AllImagesSettingData[2]):
                    $categoryImage[] = $this->storeThumbnial($destinationPath, $name, $mainPath, $file);
                    $categoryImage[] = $this->storeMedium($destinationPath, $name, $mainPath, $file);

                    //                $storeLargeImage = $Images->Largerecord($filename,$Path,$width,$height);
                    break;
                case ($width >= $AllImagesSettingData[0] || $height >= $AllImagesSettingData[1]):
                    $categoryImage[] = $this->storeThumbnial($destinationPath, $name, $mainPath, $file);
                    $categoryImage[] = $this->storeLarge($destinationPath, $name, $mainPath, $file);
                    $categoryImage[] = $this->storeMedium($destinationPath, $name, $mainPath, $file);
                    break;
                //            default:
                //                $tuhmbnail = $this->storeThumbnial($Path,$filename,$directory,$filename);
                //                $storeLargeImage = $Images->Largerecord($filename,$Path,$width,$height);
                //                $storeMediumImage = $Images->Mediumrecord($filename,$Path,$width,$height);
            }

            $id=DB::table('images')->insertGetId([
                'image_type' => '1',
                'height' => $height,
                'width' => $width,
                'path' => $uploadedString,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            $categoryImage[]=['id'=>$id,'path'=>$uploadedString,'type'=>'ACTUAL'];
            return $categoryImage;
        }
        DB::beginTransaction();

        try {

            $imageId=DB::table('images')->insertGetId([
                'image_type' => '1',
                'height' => $height,
                'width' => $width,
                'path' => $uploadedString,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);


            DB::commit();


            return $imageId;

        } catch (Exception $e) {

            DB::rollback();
            return null;
        }
    }
    /**
     * image upload Method
     * @param $request
     * @param $path
     * @param string $prefix
     * @param string $uniqueIndentifier
     * @return array
     */
    public function fileUploadMultiples($request, $path, string $prefix = '', string $uniqueIndentifier = ''): array
    {
        $uploadedFiles = [];
        foreach ($request->file as $key => $doc) {

            $media_ext = $doc->getClientOriginalName();
            $mFiles = $prefix . '_' . $uniqueIndentifier . '_' . time() . '-' . $media_ext;
            $uploadPath = $request->file('file')[$key]->storeAs(self::$base_dir . $path, $mFiles);
            $uploadPath = str_replace('public/', 'storage/', $uploadPath);
            $uploadedFiles[] = $uploadPath;
        }
        return $uploadedFiles;
    }

    /**
     * @param $request
     * @param string $fileName
     * @param string $path
     * @param $image_id
     * @param string $prefix
     * @param string $uniqueIdentifier
     * @return mixed|null
     * @throws Exception
     * @throws Throwable
     */
    public function imageUpdate($request, string $fileName, string $path, $image_id, string $prefix = 'img_', string $uniqueIdentifier = '')
    {

        $file = $request->file($fileName);
        $extension = $file->getClientOriginalExtension();
        $fileName = $this->generateRandomString(25);
        $name = $prefix . $uniqueIdentifier . '_' . time() . '-' . $fileName . '.' . $extension;
        $mainPath = 'file/images/media/' . $path . '/';
        $uploadDir = self::$base_dir . $mainPath;

        $existImageObject = Image::where('id', $image_id)->first();

        if ($existImageObject != null) {
            if (File::exists($existImageObject->path)) {

                File::delete($existImageObject->path);
            }
        }


        if (!File::exists($uploadDir)) {
            File::makeDirectory(storage_path($uploadDir), 0777, true, true);
        }

        $destinationPath = storage_path($uploadDir);
        $imageObject = ImageIntervention::make($file);
        $imageObject->save($destinationPath . $name);
        $size = getimagesize($file);
        [$width, $height, $type, $attr] = $size;

        $uploadedString = 'storage/' . $mainPath . $name;
        if ($image_id == null) {

            DB::beginTransaction();

            DB::table('images')->insert([[
                'image_type' => '1',
                'height' => $height,
                'width' => $width,
                'path' => $uploadedString,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]]);

            $image = DB::table('images')->orderBy('id', 'desc')->first();
            DB::commit();
            return $image->id;
        } else {
            DB::table('images')
                ->where('id', $image_id)
                ->update([
                    'image_type' => '1',
                    'height' => $height,
                    'width' => $width,
                    'path' => $uploadedString,
                    'updated_at' => Carbon::now(),
                ]);
            return $image_id;
        }
    }

    /**
     * @param $length
     * @return string
     */
    public function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return strtolower($randomString);
    }

    public function AllimagesHeightWidth()
    {
        $Thumbnail_height = '150';
        $Thumbnail_width = '150';
        $Medium_height = '400';
        $Medium_width = '400';
        $Large_height = '900';
        $Large_width = '900';
        $AllImagessetting = array($Thumbnail_height, $Thumbnail_width, $Medium_height, $Medium_width, $Large_height, $Large_width);
        return $AllImagessetting;
    }


    public function storeThumbnial($destinationPath, $name, $mainPath, $file)
    {
        $imageObject = ImageIntervention::make($file)->resize('150', '150');
        $name = 'THUMBNAIL' . $name;
        $imageObject->save($destinationPath . $name);
        $uploadedString = 'storage/' . $mainPath . $name;
        DB::beginTransaction();

        try {

            $id = DB::table('images')->insertGetId([
                'image_type' => '2',
                'height' => '150',
                'width' => '150',
                'path' => $uploadedString,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);


            DB::commit();
            return ['id' => $id, 'path' => $uploadedString,'type'=>'THUMBNAIL'];
        } catch (Exception $e) {

            DB::rollback();
            return null;
        }
    }

    public function storeMedium($destinationPath, $name, $mainPath, $file)
    {
        $imageObject = ImageIntervention::make($file)->resize('400', '400');
        $name = 'MEDIUM' . $name;
        $imageObject->save($destinationPath . $name);
        $uploadedString = 'storage/' . $mainPath . $name;
        DB::beginTransaction();

        try {

            $id = DB::table('images')->insertGetId([
                'image_type' => '4',
                'height' => '150',
                'width' => '150',
                'path' => $uploadedString,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);


            DB::commit();
            return ['id' => $id, 'path' => $uploadedString,'type'=>'MEDIUM'];

        } catch (Exception $e) {

            DB::rollback();
            return null;
        }
    }

    public function storeLarge($destinationPath, $name, $mainPath, $file)
    {
        $imageObject = ImageIntervention::make($file)->resize('900', '900');
        $name = 'LARGE' . $name;
        $imageObject->save($destinationPath . $name);
        $uploadedString = 'storage/' . $mainPath . $name;
        DB::beginTransaction();

        try {

            $id = DB::table('images')->insertGetId([
                'image_type' => '3',
                'height' => '900',
                'width' => '900',
                'path' => $uploadedString,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);


            DB::commit();
            return ['id' => $id, 'path' => $uploadedString,'type'=>'LARGE'];

        } catch (Exception $e) {

            DB::rollback();
            return null;
        }
    }


}
