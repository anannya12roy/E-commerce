<div id="newsletter" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="newsletter">
                    <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                    <form>
                        <input class="input" name="email" type="email" id="email_subscribe" placeholder="Enter Your Email">
                        <button type= "submit" class="newsletter-btn" id="subscribe_submit"><i class="fa fa-envelope"></i> Subscribe</button>
                    </form>
                    <ul class="newsletter-follow">
                        <li>
                            <a href="{{ $setting['facebook_link']}}"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="{{ $setting['twitter_link']}}"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="{{ $setting['instagram_link']}}"><i class="fa fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="{{ $setting['youtube_link']}}"><i class="fa fa-youtube"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>

<script>
    $(document).ready(function () {
        $('#subscribe_submit').click(function (e) {
            e.preventDefault();
            var email = $('#email_subscribe').val();
            if (email == '') {
                toastr.error('Please Enter Your Email');
            } else {
                $.ajax({
                    url: "{{ url('/subscribe-us') }}",
                    type: "POST",
                    data: {
                        "email": email,
                        "_token": "{{csrf_token()}}"
                    },
                    success: function ({message,status:code}, status) {
                        if (status === 'success') {
                            if(code==202){
                                toastr.error('You Have Already Subscribed');
                                return false;
                            }
                            $.ajax({
                                url: "{{ url('/check-subscribe-mail') }}",
                                type: "POST",
                                data: {
                                    "email": email,
                                    "_token": "{{csrf_token()}}"
                                },
                                success: function (data) {
                                    toastr.success('You Are Subscribed');
                                },
                            });
                        }
                    },
                });
            }
        });
    })
</script>
