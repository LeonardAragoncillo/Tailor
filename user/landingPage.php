<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/landing.css">
        <title>Landing Page</title>
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
                <div class="container-fluid">
                    <a href="#" class="navbar-brand">
                        <p class="brand">MMRC Tailoring</p>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 mr-4">

                            <li class="nav-item">
                                <a class="nav-link" href="../user/login.php"
                                    style="color: #000000; padding-right: 20px">Log in</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../user/signup.php"
                                    style="color: #000000; padding-right: 20px">Sign up</a>
                            </li>
                            <style>
                                .nav-link {
                                    transition: color 0.5s ease-in-out, transform 0.3s ease-in-out;
                                    /* Smooth color transition */
                                }

                                .nav-link:hover {
                                    color: rgb(2, 2, 2);
                                    text-decoration: underline;
                                    transform: scale(1.2);

                                }
                            </style>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <section>
            <div class="intro">
                <div class="phrase">
                    <h1>MMRC Tailoring</h1>
                    <h6>Where you can effortlessly schedule your ultimate fitting experience and <br>explore
                        personalized
                        tailoring services tailored just for you!</h6>

                    <div class="container">
                        <button type="button" class="btn btn-primary" id="button" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            Read More
                        </button>
                        <button type="button" class="btn btn-primary" id="button" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            Make an Appointment

                        </button>
                    </div>
                </div>
            </div>
            </div>

        </section>
        <div class="content">
            <div class="head ">
                <h1 style="padding-top: 20px; text-align: center;">Why Choose Us</h1>
            </div>
        </div>
        <div class="context-1">
            <div class="context">
                <h5>Affordable Cost</h5>
                <div class="info">
                    <img class="img1" src="../img/dollar-note-icon.png" alt="" srcset="">
                    <p id="details">At MMRC Tailoring, we speciallize in delivering<br> top-quality, budget-friendly
                        school uniforms that<br>
                        won't strain your finances.</p>
                </div>
                <h5>Convenient Online Measurement and Booking</h5>
                <div class="info">
                    <img src="../img/touchscreen-icon.png" alt="" srcset="">
                    <p id="details">Our user-friendly platforms makes it easy to book<br> appointments and provide
                        measurement online,<br> saving you time and hussle. Whether you want<br> to schedule a face to
                        face fitting or submit <br>measurements digitally, we ensure seamless, <br>stress-free process.
                    </p>
                </div>
                <h5>Fast Turnaround Time for Uniform Orders</h5>
                <div class="info">
                    <img class="img3" src="../img/alarm-icon.png" alt="" srcset="">
                    <p id="details">At MMRC Tailoring, we understand the urgency<br> of school uniform needs. That's why
                        we<br> prioritize quick, efficient service without <br>compromising on quality. With our
                        streamlined <br>production process, you'll receive your custom-<br>fitted uniforms in no time,
                        ensuring students are <br>always ready for the school year.</p>
                </div>

            </div>
            <img class="sidepic" src="../img/shop.jpg" alt="" srcset="">
        </div>
        <div class="services">
            <h1 style="text-align: center; padding: 15px; padding-top: 15px; color: #fff;">Our Services</h1>
            <div class="carousel">
                <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>

                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="../img/custom.jpg" class="d-block" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="../img/sample.jpg" class="d-block " alt="...">
                        </div>

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="footer">
            <h1 style="padding-top: 30px; text-align: center; font-weight: 700; padding-bottom: 30px;">Visit Shop Today
            </h1>
        </div>
        <div class="details">
            <div class="hours">
                <h3 style="font-weight: 600;">Opening Hours</h3>
                <div class="opening">
                    <img src="../img/clock-icon.png" alt="">
                    <p>Monday - Friday: 9:00 AM - 6:00 PM</p>

                </div>
                <div class="opening">
                    <img src="../img/clock-icon.png" alt="">
                    <p>Saturday : 8:00 AM - 5:00 PM</p>
                </div>
            </div>
            <div class="information">
                <h3 style="font-weight: 600;">Get in Touch</h3>
                <div class="icon">
                    <p>Sinunuc Z.C</p>
                    <img src="../img/maps-pin-line-icon.png" alt="">
                </div>
                <div class="icon">
                    <a class="text-decoration-none"
                        href="mailto:merzsevilla1997@gmail.com">merzsevilla1997@gmail.com</a>
                    <img src="../img/envelope-line-icon.png" alt="">
                </div>
                <div class="icon">
                    <p>09552815503</p>
                    <img src="../img/phone-line-icon.png" alt="">
                </div>
                <div class="icon" style="padding-bottom: 20px;">
                    <a class="text-decoration-none" href="https://web.facebook.com/profile.php?id=100095515893206">MMRC
                        Zamboanga Tailoring</a>
                    <img src="../img/facebook-app-round-icon.png" alt="">
                </div>

            </div>

        </div>
        <div class="d-flex justify-content-center align-items-center text-center"
            style="height: 75px; background-color: black; color: white;">
            <p class="m-0">&copy;Copyright 2023 MMRC Tailoring. All rights reserved.</p>
        </div>




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>