<div class="button d-flex justify-content-center align-items-center"><i class="fad fa-chevron-double-up"></i></div>
<div class="fluid ad-catara bg-main text-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6 p-4">
                <div class="fs-4 mb-2">
                    <i class="fal fa-book  me-1"></i> BOOKSHOP
                </div>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio, assumenda facere dolorum neque harum officia quas nam, esse simos autem! Ratione, animi consequuntur?
            </div>
            <div class="col-lg-3 col-sm-6 p-4">
                <div class="fs-4 mb-2">
                    <i class="fab fa-github  me-1"></i> Website Repo
                </div>
                <div class="last">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio, assumenda facere dolorum neque harum officia quas nam, esse simos autem!
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 p-4">
                <div class="keep mb-2">
                    <i class="fs-3 fal fa-share-alt  me-1"></i> Keep in touch with us
                </div>
                <div class="row">
                    <div class="col-12 my-1">
                        <i class="fab fa-facebook me-1"></i>
                        <a href="https://www.facebook.com/profile.php?id=100009982989915">Facebook</a>
                    </div>
                    <div class="col-12 my-1">
                        <i class="fab fa-twitter me-1"></i>
                        <a href="https://twitter.com/AdhamAliHasan?t=qF9os7jH_FgyLljMpWe0Fw&s=09">Twitter</a>
                    </div>
                    <div class="col-12 my-1">
                        <i class="fs-5 fab fa-google-plus-g me-1"></i>
                        <a href="https://www.facebook.com/profile.php?id=100009982989915">Google-Plus</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 p-4">
                <div class="fs-4 mb-2">
                    <i class="fal fa-info-circle  me-1"></i> Information
                </div>
                <div class="row last wts w-75">
                    <div class="col-6 mb-2">About Us</div>
                    <div class="col-6  mb-2">Terms&conditions</div>
                    <div class="col-6  mb-2">Contact Us</div>
                    <div class="col-6  mb-2">My Accounts</div>
                    <div class="col-6">FAQ</div>
                    <div class="col-6">Blog</div>
                </div>
            </div>
        </div>
    </div>

</div>
<footer class="p-3 text-center bg-bolder text-light">
    <div class="container">
        <p class="fs-6 mb-1">
            Copyrights &copy; 2021 Database Team
        </p>
        <a href="#" class="fs-5 upbutton">
            <i class="bi bi-arrow-up-circle"></i>
        </a>
    </div>

</footer>
<script>
        let btn = document.querySelector('.button')
        document.addEventListener('scroll', () => {
            if (scrollY) {
                btn.style.right = '1%';
            } else {
                btn.style.right = '-4%';
            }
        })
        btn.addEventListener('click', () => {
            scrollTo({
                top: 0,
                behavior: 'smooth'
            })
        })
</script>