<?php
    if(isset($_GET['logout']) && $_GET['logout']=='logoutclient'){
        unset($_SESSION['login_guest']);
        header('location:index.php');
    }
?>


<!-- Product slider + Header -->
<div class="product-slider">
    <div class="header-section">
        <div class="collapse" id="navbarToggleExternalContent">
            <div class="container-fluid">
            <main class="card-container bd-grid mx-auto">
                <a href="index.php?action=product-all">
                    <article class="nav-card-item bg-color-gray">
                        <div class="card__img">
                            <img src="media/image/category/all.png" alt="">
                        </div>
                        <div class="card__name">
                            <p>Shop all</p>
                        </div>
                    </article>
                </a>
                <a href="index.php?action=product-mouse">
                    <article class="nav-card-item bg-color-gray">
                        <div class="card__img">
                            <img src="media/image/category/mouse.png" alt="">
                        </div>
                        <div class="card__name">
                            <p>Mouse</p>
                        </div>
                    </article>
                </a>
                <a href="index.php?action=product-keyboard">
                    <article class="nav-card-item bg-color-gray">
                        <div class="card__img">
                            <img src="media/image/category/keyboard.png" alt="">
                        </div>
                        <div class="card__name">
                            <p>Keyboard</p>
                        </div>
                    </article>
                </a>
                <a href="index.php?action=product-headset">
                <article class="nav-card-item bg-color-gray">
                    <div class="card__img">
                        <img src="media/image/category/headset.png" alt="">
                    </div>
                    <div class="card__name">
                        <p>Headset</p>
                    </div>
                </article> 
                </a>
            </main>
        </div>
        </div>
        <nav class="navbar navbar-dark bg-transparent py-lg-5">
            <div class="container-fluid d-flex">
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="toggler-icon top-bar"></span>
                    <span class="toggler-icon middle-bar"></span>
                    <span class="toggler-icon bottom-bar"></span>
                </button>
                <a class="navbar-brand mx-auto" href="#">  GEAR!</a>
                <div class="dropstart">
                    <button class="btn btn-warning" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                    </svg>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <li class="p-3 pt-0"><b>Hello, <?php echo $_SESSION['login_guest']?>!</b></li>
                        <li><a class="text-decoration-none" href="./index.php?action=user-info"><button type="button" class="dropdown-item">Th??ng tin mua h??ng</button></a></li>
                        <li><a class="text-decoration-none" href="./index.php?logout=logoutclient"><button type="button" class="dropdown-item" name="logout">????ng xu???t</button></a></a></li>
                    </ul>
                </div>
                <a href="index.php?action=checkout">
                    <button type="button" class="btn btn-light me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                    </button>
                </a>
            </div>
        </nav>
    </div>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <video class="img-fluid" autoplay loop muted>
                <source src="media/video/video1.mp4" type="video/mp4" />
            </video>
            <div class="carousel-caption container-md position-absolute top-50 start-50 translate-middle carousel-text">
                <h1>Tr???i nghi???m kh??ng gi???i h???n v???i G435</h1>
                <p>Ch??i game, ph??t ??m nh???c v?? ch??i ????a c??ng b???n b??. Tai nghe ch??i game G435 k???t n???i v???i m??y t??nh, ??i???n tho???i v?? c??c thi???t b??? kh??c c???a b???n th??ng qua c??ng ngh??? kh??ng d??y LIGHTSPEED c???p ????? ch??i game v?? Bluetooth??. N?? ??em l???i ??m thanh m???nh m??? v?? r?? r??ng, ?????ng th???i c??c mic t???o ch??m gi??p gi???m t???p ??m n???n. N?? c??ng ???????c l??m t??? t???i thi???u 22% nh???a t??i ch??? h???u ti??u d??ng. Ch??i kh??ng d???t v???i G435.</p>
                <button type="button" class="btn btn-info btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">T??m hi???u th??m</button>
            </div>
            </div>
            <div class="carousel-item">
            <video class="img-fluid" autoplay loop muted>
                <source src="media/video/video_kishi.mp4" type="video/mp4" />
            </video>
            <div class="carousel-caption container-md position-absolute top-50 start-50 translate-middle carousel-text">
                <h1>RAZER Kishi</h1>
                <p>Mang theo t???a game A-tier c???a b???n b???t k?? l??c n??o, b???t k?? ????u.</p>
                <button type="button" class="btn btn-info btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">T??m hi???u th??m</button>
            </div>
            </div>
            <div class="carousel-item">
            <video class="img-fluid" autoplay loop muted>
                <source src="media/video/video_razerbook.mp4" type="video/mp4" />
            </video>
            <div class="carousel-caption d-none d-md-block carousel-text text-dark">
                <h1>RAZER Blade 15</h5>
                <p>Nay v???i b??? x??? l?? Intel Gen 11th.</p>
                <button type="button" class="btn btn-light btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">T??m hi???u th??m</button>
            </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Gi???i thi???u</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>
        About this item<br><br>

        Total comfort: G435 small gaming headset fits a wide range of people but is designed for younger players with memory foam ear cushions and sizing for smaller head sizes<br>
        Versatile: Logitech G435 is the first headset with LIGHTSPEED wireless and low latency Bluetooth connectivity, providing more freedom of play on PC, smartphones, Playstation gaming devices<br>
        Lightweight: With a lightweight construction, this wireless gaming headset weighs only 5.8 oz (165 g), making it comfortable to wear all day long<br>
        Superior voice quality: Be heard loud and clear thanks to the built-in dual beamforming microphones that eliminate the need for a mic arm and reduce background noise<br>
        Immersive sound: This cool and colorful headset delivers carefully balanced, high-fidelity audio with 40 mm drivers; compatibility with Dolby Atmos, Windows Sonic for a true surround sound experience<br>
        Long battery life: No need to stop the game to recharge thanks to G435's 18 hours of battery life, allowing you to keep playing, talking to friends, and listening to music all day<br>
        More sustainable: The plastic parts are made from a minimum 22% post-consumer recycled plastic, paper packaging comes from FSC-certified forests, G435 is certified CarbonNeutral<br>
        Safer: An optional max volume limiter at less than 85 decibel can be activated to protect eardrums during extended use
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">????ng</button>
      </div>
    </div>
  </div>
</div>

<!-- Content -->
<div class="container-fluid product-category">
    <div class="product-category-text text-center mt-lg-5">
        <h1>THI???T B??? CH??I GAME TI??N TI???N</h1>
        <p>Ch??i v???i phong ????? ?????nh cao v???i nh???ng thi???t b??? ch??i game hi???u su???t t??? GEAR!</p>
    </div>
    <div class="product-category-nav">
        <div class="container-fluid">
        <main class="card-container bd-grid mx-auto">
            <a href="index.php?action=product-all">
            <article class="nav-card-item bg-color-gradient">
                <div class="card__img">
                    <img src="media/image/category/all.png" alt="">
                </div>
                <div class="card__name">
                    <p>Shop all</p>
                </div>
            </article>
            </a>
            <a href="index.php?action=product-mouse">
            <article class="nav-card-item bg-color-gradient">
                <div class="card__img">
                    <img src="media/image/category/mouse.png" alt="">
                </div>
                <div class="card__name">
                    <p>Mouse</p>
                </div>
            </article>
            </a>
            <a href="index.php?action=product-keyboard">
            <article class="nav-card-item bg-color-gradient">
                <div class="card__img">
                    <img src="media/image/category/keyboard.png" alt="">
                </div>
                <div class="card__name">
                    <p>Keyboard</p>
                </div>
            </article>
            </a>
            <a href="index.php?action=product-headset">
            <article class="nav-card-item bg-color-gradient">
                <div class="card__img">
                    <img src="media/image/category/headset.png" alt="">
                </div>
                <div class="card__name">
                    <p>Headset</p>
                </div>
            </article> 
            </a>
        </main>
    </div>
    </div>
</div>
<div class="container-fluid about-us position-relative">
    <div class="position-absolute top-50 start-50 translate-middle">
        <h1>"<span>GEAR!</span> Chi???n th???ng trong m???i cu???c chi???n"</h1>
        <p>T??? h??o l?? nh?? ph??n ph???i h??ng ?????u Vi???t Nam - Nguy???n ????nh Qu??</p>
    </div>
</div>
<div class="container-fluid player-quote position-relative">
    <div class="position-absolute top-50 start-50 translate-middle highlight-quote">
    <h1>"T??? l??c d??ng ????? c???a <span>GEAR!</span>, t??i l??c n??o c??ng th???ng!"</h1>
    <p>S1mple - Tuy???n th??? chuy??n nghi???p t??? Natus Vincere</p>
</div>
</div>

<div class="mt-5 container-lg">
    <footer class="py-5">
        <div class="row">
        <div class="col-2">
            <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
            <h3 class="mb-0 main-logo">GEAR!</h3>
            </a>
            <p class="text-muted">?? 2021</p>
        </div>

        <div class="col-2">
            <h5>Menu</h5>
            <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">V??? ?????u trang</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Gi???i thi???u</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">L???ch s??? ph??t tri???n</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">V??? ch??ng t??i</a></li>
            </ul>
        </div>

        <div class="col-2">
            <h5>Menu</h5>
            <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">V??? ?????u trang</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Gi???i thi???u</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">L???ch s??? ph??t tri???n</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">V??? ch??ng t??i</a></li>
            </ul>
        </div>

        <div class="col-4 offset-1">
            <form>
            <h5>????ng k?? ????? nh???n th??ng b??o t??? GEAR!</h5>
            <p>GEAR! cam k???t kh??ng l??m phi???n b???n, ch??? mang ?????n th??ng tin khuy???n m??i m?? b???n mong ch???.</p>
            <div class="d-flex w-100 gap-2">
                <label for="newsletter1" class="visually-hidden">Email address</label>
                <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                <button class="btn btn-primary" type="button">Subscribe</button>
            </div>
            </form>
        </div>
        </div>

        <div class="d-flex justify-content-between py-4 my-4 border-top">
        <p>?? 2021 GEAR!, Inc. All rights reserved.</p>
        <ul class="list-unstyled d-flex">
            <li><ion-icon class="card__icon ms-3" name="logo-facebook"></ion-icon></li>
            <li><ion-icon class="card__icon ms-3" name="logo-instagram"></ion-icon></li>
            <li><ion-icon class="card__icon ms-3" name="logo-twitter"></ion-icon></li>
            <li><ion-icon class="card__icon ms-3" name="logo-twitch"></ion-icon></li>
        </ul>
        </div>
    </footer>
</div>