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
                        <li><a class="text-decoration-none" href="./index.php?action=user-info"><button type="button" class="dropdown-item">Thông tin mua hàng</button></a></li>
                        <li><a class="text-decoration-none" href="./index.php?logout=logoutclient"><button type="button" class="dropdown-item" name="logout">Đăng xuất</button></a></a></li>
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
                <h1>Trải nghiệm không giới hạn với G435</h1>
                <p>Chơi game, phát âm nhạc và chơi đùa cùng bạn bè. Tai nghe chơi game G435 kết nối với máy tính, điện thoại và các thiết bị khác của bạn thông qua công nghệ không dây LIGHTSPEED cấp độ chơi game và Bluetooth®. Nó đem lại âm thanh mạnh mẽ và rõ ràng, đồng thời các mic tạo chùm giúp giảm tạp âm nền. Nó cũng được làm từ tối thiểu 22% nhựa tái chế hậu tiêu dùng. Chơi không dứt với G435.</p>
                <button type="button" class="btn btn-info btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">Tìm hiểu thêm</button>
            </div>
            </div>
            <div class="carousel-item">
            <video class="img-fluid" autoplay loop muted>
                <source src="media/video/video_kishi.mp4" type="video/mp4" />
            </video>
            <div class="carousel-caption container-md position-absolute top-50 start-50 translate-middle carousel-text">
                <h1>RAZER Kishi</h1>
                <p>Mang theo tựa game A-tier của bạn bất kì lúc nào, bất kì đâu.</p>
                <button type="button" class="btn btn-info btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">Tìm hiểu thêm</button>
            </div>
            </div>
            <div class="carousel-item">
            <video class="img-fluid" autoplay loop muted>
                <source src="media/video/video_razerbook.mp4" type="video/mp4" />
            </video>
            <div class="carousel-caption d-none d-md-block carousel-text text-dark">
                <h1>RAZER Blade 15</h5>
                <p>Nay với bộ xử lý Intel Gen 11th.</p>
                <button type="button" class="btn btn-light btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">Tìm hiểu thêm</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Giới thiệu</h5>
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
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>

<!-- Content -->
<div class="container-fluid product-category">
    <div class="product-category-text text-center mt-lg-5">
        <h1>THIẾT BỊ CHƠI GAME TIÊN TIẾN</h1>
        <p>Chơi với phong độ đỉnh cao với những thiết bị chơi game hiệu suất từ GEAR!</p>
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
        <h1>"<span>GEAR!</span> Chiến thắng trong mọi cuộc chiến"</h1>
        <p>Tự hào là nhà phân phối hàng đầu Việt Nam - Nguyễn Đình Quý</p>
    </div>
</div>
<div class="container-fluid player-quote position-relative">
    <div class="position-absolute top-50 start-50 translate-middle highlight-quote">
    <h1>"Từ lúc dùng đồ của <span>GEAR!</span>, tôi lúc nào cũng thắng!"</h1>
    <p>S1mple - Tuyển thủ chuyên nghiệp từ Natus Vincere</p>
</div>
</div>

<div class="mt-5 container-lg">
    <footer class="py-5">
        <div class="row">
        <div class="col-2">
            <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
            <h3 class="mb-0 main-logo">GEAR!</h3>
            </a>
            <p class="text-muted">© 2021</p>
        </div>

        <div class="col-2">
            <h5>Menu</h5>
            <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Về đầu trang</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Giới thiệu</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Lịch sử phát triển</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Về chúng tôi</a></li>
            </ul>
        </div>

        <div class="col-2">
            <h5>Menu</h5>
            <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Về đầu trang</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Giới thiệu</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Lịch sử phát triển</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Về chúng tôi</a></li>
            </ul>
        </div>

        <div class="col-4 offset-1">
            <form>
            <h5>Đăng ký để nhận thông báo từ GEAR!</h5>
            <p>GEAR! cam kết không làm phiền bạn, chỉ mang đến thông tin khuyến mãi mà bạn mong chờ.</p>
            <div class="d-flex w-100 gap-2">
                <label for="newsletter1" class="visually-hidden">Email address</label>
                <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                <button class="btn btn-primary" type="button">Subscribe</button>
            </div>
            </form>
        </div>
        </div>

        <div class="d-flex justify-content-between py-4 my-4 border-top">
        <p>© 2021 GEAR!, Inc. All rights reserved.</p>
        <ul class="list-unstyled d-flex">
            <li><ion-icon class="card__icon ms-3" name="logo-facebook"></ion-icon></li>
            <li><ion-icon class="card__icon ms-3" name="logo-instagram"></ion-icon></li>
            <li><ion-icon class="card__icon ms-3" name="logo-twitter"></ion-icon></li>
            <li><ion-icon class="card__icon ms-3" name="logo-twitch"></ion-icon></li>
        </ul>
        </div>
    </footer>
</div>