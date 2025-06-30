<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>MidentLucia</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Topbar Start -->
        <div class="container-fluid topbar px-0 d-none d-lg-block">
            <div class="container px-0">
                <div class="row gx-0 align-items-center" style="height: 45px;">
                    <div class="col-lg-8 text-center text-lg-start mb-lg-0">
                        <div class="d-flex flex-wrap">
                            <a href="#" class="text-muted me-4"><i class="fas fa-map-marker-alt text-primary me-2"></i>Calle Tecte #234, Cusco, Perú</a>
                            <a href="#" class="text-muted me-4"><i class="fas fa-phone-alt text-primary me-2"></i>+51 997 498 670</a>
                            <a href="#" class="text-muted me-0"><i class="fas fa-envelope text-primary me-2"></i>MidentLucia@gmail.com</a>

                        </div>
                    </div>
                    <div class="col-lg-4 text-center text-lg-end">
                        <div class="d-flex align-items-center justify-content-end">
                            <a href="#" class="btn btn-primary btn-square rounded-circle nav-fill me-3"><i class="fab fa-facebook-f text-white"></i></a>
                            <a href="#" class="btn btn-primary btn-square rounded-circle nav-fill me-3"><i class="fab fa-twitter text-white"></i></a>
                            <a href="#" class="btn btn-primary btn-square rounded-circle nav-fill me-3"><i class="fab fa-instagram text-white"></i></a>
                            <a href="#" class="btn btn-primary btn-square rounded-circle nav-fill me-0"><i class="fab fa-linkedin-in text-white"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar End -->


        <!-- Navbar & Hero Start -->
        <div class="container-fluid sticky-top px-0">
            <div class="position-absolute bg-dark" style="left: 0; top: 0; width: 100%; height: 100%;">
            </div>
            <div class="container px-0">
                <nav class="navbar navbar-expand-lg navbar-dark bg-white py-0 px-0" style="border-radius:7px;height: 60px; margin: 0;">
                    <div class="container-fluid d-flex align-items-center" style="height: 100%; padding: 0; margin: 0;">

                    <a href="index.html" class="navbar-brand p-0">
                        <a class="navbar-brand d-flex align-items-center ms-4 me-5" href="{{ route('login') }}">
                        <img src="img/diente.png" alt="Logo" style="height: 65px; margin-right: 10px;">
                        <span class="ms-2 fw-bold text-dark margin-left: 50px;" style="color: #3456de; font-weight: bold;">MidentLucia</span>
                    </a>


                    </a>
                            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    <div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
                            <div class="navbar-nav py-0 gap-3"> <!-- Usamos gap con Bootstrap 5 -->
                                <a href="{{ url('/') }}" class="nav-item nav-link active">Inicio</a>
                                <a href="{{ url('/acerca de') }}" class="nav-item nav-link">Acerca de</a>
                                <a href="{{ url('/servicios') }}" class="nav-item nav-link">Servicios</a>
                                <a href="{{ url('/especialistas') }}" class="nav-item nav-link">Especialistas</a>
                                <a href="{{ url('/testimonios') }}" class="nav-item nav-link">Testimonios</a>
                                <a href="{{ url('/contactenos') }}" class="nav-item nav-link">Contactenos</a>
                            </div>
                        </div>
                </nav>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h4 class="modal-title mb-0" id="exampleModalLabel">Search by keyword</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->

                <!-- Carousel Start -->
        <div class="header-carousel owl-carousel">
            <div class="header-carousel-item">
                <div class="header-carousel-item-img-1">
                    <img src="img/fondomident.webp" class="img-fluid w-100" alt="Image">
                </div>
                <div class="carousel-caption">
                    <div class="carousel-caption-inner text-start p-3">
                        <h1 class="display-1 text-capitalize text-white mb-4 fadeInUp animate__animated" data-animation="fadeInUp" data-delay="1.3s" style="animation-delay: 1.3s;">Su sonrisa en las mejores manos</h1>
                        <p class="mb-5 fs-5 fadeInUp animate__animated" data-animation="fadeInUp" data-delay="1.5s" style="animation-delay: 1.5s;">Cuidamos de su salud bucal con los más altos estándares de calidad y tecnología de vanguardia 
                        </p>
                        <a class="btn btn-primary rounded-pill py-3 px-5 mb-4 me-4 fadeInUp animate__animated" data-animation="fadeInUp" data-delay="1.5s" style="animation-delay: 1.7s;" href="#">Agendar una cita </a>
                        <a class="btn btn-dark rounded-pill py-3 px-5 mb-4 fadeInUp animate__animated" data-animation="fadeInUp" data-delay="1.5s" style="animation-delay: 1.7s;" href="#">Conocer servicios</a>
                    </div>
                </div>
            </div>
            <div class="header-carousel-item mx-auto">
                <div class="header-carousel-item-img-2">
                    <img src="img/consultorio-png.jpg" class="img-fluid w-100" alt="Image">
                </div>
                <div class="carousel-caption">
                    <div class="carousel-caption-inner text-center p-3">
                        <h1 class="display-1 text-capitalize text-white mb-4">Su sonrisa en las mejores manos</h1>
                        <p class="mb-5 fs-5">Cuidamos de su salud bucal con los más altos estándares de calidad y tecnología de vanguardia</p>
                        <a class="btn btn-primary rounded-pill py-3 px-5 mb-4 me-4" href="#">Agendar una cita</a>
                        <a class="btn btn-dark rounded-pill py-3 px-5 mb-4" href="#">Conocer servicios </a>
                    </div>
                </div>
            </div>
            <div class="header-carousel-item">
                <div class="header-carousel-item-img-3">
                    <img src="img/inicioM.png" class="img-fluid w-100" alt="Image">
                </div>
                <div class="carousel-caption">
                    <div class="carousel-caption-inner text-end p-3">
                        <h1 class="display-1 text-capitalize text-white mb-4">Su sonrisa en las mejores manos</h1>
                        <p class="mb-5 fs-5">Cuidamos de su salud bucal con los más altos estándares de calidad y tecnología de vanguardia, 
                        </p>
                        <a class="btn btn-primary rounded-pill py-3 px-5 mb-4 me-4" href="#">Agendar una cita </a>
                        <a class="btn btn-dark rounded-pill py-3 px-5 mb-4" href="#">Conocer servicios</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->



        <!-- About Start -->
        <div class="container-fluid about bg-light py-5">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 col-xl-5 wow fadeInLeft" data-wow-delay="0.1s">
                        <div class="about-img">
                            <img src="img/sobre.png" class="img-fluid w-100 rounded-top bg-white" alt="Image">
                            <img src="img/nosotros.png" class="img-fluid w-100 rounded-bottom" alt="Image">
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-7 wow fadeInRight" data-wow-delay="0.3s">
                        <h4 class="text-primary">Consultorio Dental</h4>
                        <h1 class="display-5 mb-4">Consultorio Dental, Mident Lucia "Somos especialistas en restauraciones esteticas</h1>
                        <p class="text ps-4 mb-4">Atención especializada para niños (Odontopediatría)
 ¡Y mucho más!
 Atendidos por especialistas con postgrado internacional.
 Contamos con las mejores promociones para ti y tu familia.
En tan solo una visita puedes salir renovada y con una sonrisa radiante!
                        </p>
                        <div class="row g-4 justify-content-between mb-5">
                        </div>
                        <div class="row g-4 justify-content-between mb-5">
                            <div class="col-xl-5"><a href="#" class="btn btn-primary rounded-pill py-3 px-5">Ver Testimonios</a></div>
                            <div class="col-xl-7 mb-5">
                                <div class="about-customer d-flex position-relative">
                                    <img src="img/customer-img-1.jpg" class="img-fluid btn-xl-square position-absolute" style="left: 0; top: 0;"  alt="Image">
                                    <img src="img/customer-img-2.jpg" class="img-fluid btn-xl-square position-absolute" style="left: 45px; top: 0;" alt="Image">
                                    <img src="img/customer-img-3.jpg" class="img-fluid btn-xl-square position-absolute" style="left: 90px; top: 0;" alt="Image">
                                    <img src="img/customer-img-1.jpg" class="img-fluid btn-xl-square position-absolute" style="left: 135px; top: 0;" alt="Image">
                                    <div class="position-absolute text-dark" style="left: 220px; top: 10px;">
                                        <p class="mb-0"></p>
                                        <p class="mb-0">no te pierdas de los servicios que brindamos</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

 <!-- Services Start -->
<div class="container-fluid service py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h4 class="text-primary">NUESTROS SERVICIOS</h4>
            <h1 class="display-4"> En Mident Lucia, contamos con todos los tratamientos que necesitas para tu salud dental:
 </h1>
 <span class="ms-2 fw-bold text-dark margin-left: 50px;" style="color: #3456de; font-weight: bold;">Atención especial para niños (odontopediatría)
Además, tenemos las mejores promociones para ti y toda tu familia.</span>
<p>Porque tu salud bucal está en manos de verdaderos especialistas con postgrado internacional.
¡Te esperamos con una sonrisa</p>
        </div>
        <div class="row g-4 justify-content-center text-center">
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item bg-light rounded">
                    <div class="service-img">
                        <img src="img/image.png" class="img-fluid w-100 rounded-top" alt="">
                    </div>
                    <div class="service-content text-center p-4">
                        <div class="service-content-inner">
                            <a href="#" class="h4 mb-4 d-inline-flex text-start"><i class="fas fa-donate fa-2x me-2"></i> Ortodoncia</a>
                            <p class="mb-4">mejorando la fusion y estetica de la sonrisa </p>
                            <a class="btn btn-light rounded-pill py-2 px-4" href="#">ver mas</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item bg-light rounded">
                    <div class="service-img">
                        <img src="img/limpieza.png" class="img-fluid w-100 rounded-top" alt="">
                    </div>
                    <div class="service-content text-center p-4">
                        <div class="service-content-inner">
                            <a href="#" class="h4 mb-4 d-inline-flex text-start"><i class="fas fa-donate fa-2x me-2"></i> Limpieza</a>
                            <p class="mb-4">prevenir las caries</p>
                            <a class="btn btn-light rounded-pill py-2 px-4" href="#">ver mas</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item bg-light rounded">
                    <div class="service-img">
                        <img src="img/blanqueamiento.png" class="img-fluid w-100 rounded-top" alt="">
                    </div>
                    <div class="service-content text-center p-4">
                        <div class="service-content-inner">
                            <a href="#" class="h4 mb-4 d-inline-flex text-start"><i class="fas fa-donate fa-2x me-2"></i> Blanqueamiento</a>
                            <p class="mb-4">mejorando la fusion y estetica de la sonrisa</p>
                            <a class="btn btn-light rounded-pill py-2 px-4" href="#">ver mas</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Segunda fila duplicada -->
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item bg-light rounded">
                    <div class="service-img">
                        <img src="img/estetica.png" class="img-fluid w-100 rounded-top" alt="Estetica">
                    </div>
                    <div class="service-content text-center p-4">
                        <div class="service-content-inner">
                            <a href="#" class="h4 mb-4 d-inline-flex text-start"><i class="fas fa-donate fa-2x me-2"></i> Estetica</a>
                            <p class="mb-4">mejorando la fusion y estetica de la sonrisa</p>
                            <a class="btn btn-light rounded-pill py-2 px-4" href="#">ver mas</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item bg-light rounded">
                    <div class="service-img">
                        <img src="img/Odontopediatria.png" class="img-fluid w-100 rounded-top" alt="">
                    </div>
                    <div class="service-content text-center p-4">
                        <div class="service-content-inner">
                            <a href="#" class="h4 mb-4 d-inline-flex text-start"><i class="fas fa-donate fa-2x me-2"></i> Odontopediatria</a>
                            <p class="mb-4">mejorando la fusion y estetica de la sonrisa</p>
                            <a class="btn btn-light rounded-pill py-2 px-4" href="#">ver mas</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item bg-light rounded">
                    <div class="service-img">
                        <img src="img/Rehabilitacion.png" class="img-fluid w-100 rounded-top" alt="">
                    </div>
                    <div class="service-content text-center p-4">
                        <div class="service-content-inner">
                            <a href="#" class="h4 mb-4 d-inline-flex text-start"><i class="fas fa-donate fa-2x me-2"></i> Rehabilitacion</a>
                            <p class="mb-4">mejorando la fusion y estetica de la sonrisa </p>
                            <a class="btn btn-light rounded-pill py-2 px-4" href="#">ver mas</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Services End -->
      


        

        <!-- Team Start -->
    <section id="doctors" class="doctors section mt-5 mb-5">

      <!-- Section Title -->
     <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 1000px;">
                    <h4 class="text-primary">Nuestro Equipo de Especialistas</h4>
                    <h1 class="display-4">Profesionales comprometidos con tu salud bucal.</h1>
                     <p class="mb-0">Contamos con un equipo de profesionales altamente calificados y con amplia experiencia en diferentes áreas de la odontología.
                    </p>
     </div>

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="img\team-1.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h3>Dra. Ana Lucía Rondán Aguirre</h3>
                <h6 class="d-flex gap-3">
                  <span>Cirujana Dentista</span>
                  <span>COP 138421</span>
                </h6>
                <h6>Formación Académica:</h6>
                <p> Máster en Ortodoncia
Pontificia Universidad Javeriana — Colombia
Junio 2018 <br>
                Doctorado en Estética Dental
Universidad de Barcelona — España
Marzo 2021</p>
              </div>
            </div>
          </div><!-- End Team Member -->

         <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="img\team-2.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h3>Dr. Carlos Martín Méndez </h3>
                 <h6 class="d-flex gap-3">
                  <span>Ortodoncia</span>
                  <span>COP 102093</span>
                </h6>
                <h6>Formación Académica:</h6>
                <p> Especialización en Rehabilitación Oral
Universidad Nacional Autónoma de México — México
Agosto 2017<br>
                Doctorado en Estética Dental
Universidad de Barcelona — España
Marzo 2021</p>
              </div>
            </div>
          </div><!-- End Team Member -->


        </div>

      </div>

    </section><!-- /Doctors Section -->


        <!-- Team End -->


        <!-- Testimonial Start -->
        <div class="container-fluid testimonial py-5">
            <div class="container py-5">
                <div class="row g-4 align-items-center">
                    <div class="col-xl-4 wow fadeInLeft" data-wow-delay="0.1s">
                        <div class="h-100 rounded">
                            <h4 class="text-primary">Nuestros Testimonios </h4>
                            <h1 class="display-4 mb-4">Clientes</h1>
                            <p class="mb-4">Nuestros clientes lo confirman, somos confianza y eficacia</p>
                            <a class="btn btn-primary rounded-pill text-white py-3 px-5" href="#">Read All Reviews <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="testimonial-carousel owl-carousel wow fadeInUp" data-wow-delay="0.1s">
                            <div class="testimonial-item bg-white rounded p-4 wow fadeInUp" data-wow-delay="0.3s">
                                <div class="d-flex">
                                    <div><i class="fas fa-quote-left fa-3x text-dark me-3"></i></div>
                                    <p class="mt-4">Siempre tuve complejos por el color amarillento de mis dientes. Después del tratamiento de blanqueamiento, mi sonrisa luce increíble. El proceso fue rápido, indoloro y los resultados son notables. Ahora sonrío con total confianza.
                                    </p>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <div class="my-auto text-end">
                                        <h5>Manuel Alvarado</h5>
                                        <p class="mb-0">Tratamiento de Periodoncia</p>
                                    </div>
                                    <div class="bg-white rounded-circle ms-3">
                                        <img src="img/manuel.png" class="rounded-circle p-2" style="width: 80px; height: 80px; border: 1px solid; border-color: var(--bs-primary);" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-item bg-white rounded p-4 wow fadeInUp" data-wow-delay="0.5s">
                                <div class="d-flex">
                                    <div><i class="fas fa-quote-left fa-3x text-dark me-3"></i></div>
                                    <p class="mt-4">Siempre tuve complejos por el color amarillento de mis dientes. Después del tratamiento de blanqueamiento, mi sonrisa luce increíble. El proceso fue rápido, indoloro y los resultados son notables. Ahora sonrío con total confianza.
                                    </p>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <div class="my-auto text-end">
                                        <h5>Camila Fontana</h5>
                                        <p class="mb-0">Tratamiento de Ortodoncia</p>
                                    </div>
                                    <div class="bg-white rounded-circle ms-3">
                                        <img src="img/camila.png" class="rounded-circle p-2" style="width: 80px; height: 80px; border: 1px solid; border-color: var(--bs-primary);" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-item bg-white rounded p-4 wow fadeInUp" data-wow-delay="0.7s">
                                <div class="d-flex">
                                    <div><i class="fas fa-quote-left fa-3x text-dark me-3"></i></div>
                                    <p class="mt-4">Siempre tuve complejos por el color amarillento de mis dientes. Después del tratamiento de blanqueamiento, mi sonrisa luce increíble. El proceso fue rápido, indoloro y los resultados son notables. Ahora sonrío con total confianza.
                                    </p>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <div class="my-auto text-end">
                                        <h5>Carlos Manrique</h5>
                                        <p class="mb-0">Tratamiento de Blanqueamiento dental</p>
                                    </div>
                                    <div class="bg-white rounded-circle ms-3">
                                        <img src="img/carlos.png" class="rounded-circle p-2" style="width: 80px; height: 80px; border: 1px solid; border-color: var(--bs-primary);" alt="">
                                    </div>
                                </div>

                            </div>
                            <div class="d-flex text-primary">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Testimonial End -->

          <!-- FAQ Start -->
        <div class="container-fluid faq py-5">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                        <div class="pb-5">
                            <h4 class="text-primary">Preguntas frecuentes</h4>
                            <h1 class="display-4">Obtenga las respuestas a las preguntas más frecuentes</h1>
                        </div>
                       <div class="accordion bg-light rounded p-4" id="accordionExample">
                            <div class="accordion-item border-0 mb-4">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button text-dark fs-5 fw-bold rounded-top" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseTOne">
                                       ¿Cómo puedo agendar una cita?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body my-2">
                                        <p>Puede agendar una cita llamando a nuestro número telefónico, enviando un correo electrónico o completando el formulario de contacto en esta página.  </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-0 mb-4">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed text-dark fs-5 fw-bold rounded-top" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        ¿Aceptan seguros dentales? 
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body my-2">
                                        <p>Generalmente, los seguros dentales cubren una variedad de tratamientos, como limpiezas, radiografías, empastes, extracciones y tratamientos de conducto. Algunos seguros también ofrecen cobertura para tratamientos más especializados, como ortodoncia, implantes o tratamientos estéticos, pero esto puede variar según el plan. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-0 mb-4">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed text-dark fs-5 fw-bold rounded-top" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        ¿Qué debo llevar a mi primera cita?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body my-2">
                                        <p>Para tu primera cita, es recomendable llevar una actitud positiva y abierta, vestimenta cómoda que te haga sentir seguro, y temas de conversación interesantes que te permitan conocer mejor a la otra persona. También es importante llegar a tiempo y mostrar respeto por tu cita. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-0 mb-0">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed text-dark fs-5 fw-bold rounded-top" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        ¿Ofrecen planes de pago?
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="accordion-body my-2">
                                        <p>En resumen, los planes de pago son acuerdos que permiten pagar un bien o servicio en cuotas, facilitando el acceso a productos y servicios que de otro modo podrían resultar inaccesibles para algunos clientes. </p>
                                    </div>
                                </div>
                            </div>
                       </div>
                    </div>
                    <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
                        <div class="faq-img RotateMoveRight rounded">
                            <img src="img/preguntas.jpg" class="img-fluid rounded w-100" alt="Image">
                            <a class="faq-btn btn btn-primary rounded-pill text-white py-3 px-5" href="#">ver mas <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- FAQ End -->
        <!-- FAQ End -->

      <!-- Footer Start -->
        <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">

            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <div class="footer-item">
                                <h4 class="text-white mb-4">MidentLucia</h4>
                                <p class="mb-3">Consultorio Dental, Mident Lucia "Somos especialistas en restauraciones esteticas</p>
                                <div class="position-relative mx-auto rounded-pill">
                                    <input class="form-control rounded-pill w-100 py-3 ps-4 pe-5" type="text" placeholder="Enter your email">
                                    <button type="button" class="btn btn-primary rounded-pill position-absolute top-0 end-0 py-2 mt-2 me-2">redsocial</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="text-white mb-4">Enlaces Rápidos</h4>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Inico</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Servicios</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Acerca de</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Especialistas</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> testimonios</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Contactenos</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="text-white mb-4">Nuestros servicios</h4>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Ortodoncia</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Limpieza</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Blanqueamiento</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Estetica</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Odontopediatria</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Rehabilitacion</a>
                            <div class="d-flex align-items-center">
                                <a class="btn btn-light btn-md-square me-2" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-light btn-md-square me-2" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-light btn-md-square me-2" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-light btn-md-square me-0" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item-post d-flex flex-column">
                            <h4 class="text-white mb-4">Contactanos</h4>
                            <div class="d-flex flex-column mb-3">
                                <p class="text-uppercase text-primary mb-2">Calle Tecte #234, Cusco, Perú  </p>
                                <a href="#" class="text-body">51 997 498 670</a>
                            </div>
                            <div class="d-flex flex-column mb-3">
                                <p class="text-uppercase text-primary mb-2">MidentLucia@gmail.com </p>
                               
                            </div>
                            <div class="footer-btn text-start">
                                <a href="#" class="btn btn-light rounded-pill px-4">Volver al inicio <i class="fa fa-arrow-right ms-1"></i></a>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Footer End -->

        
        <!-- Copyright Start -->
        <div class="container-fluid copyright py-4">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-md-6 text-center text-md-start mb-md-0">
                        <span class="text-body"><a href="#" class="border-bottom text-primary"><i class="fas fa-copyright text-light me-2"></i>Your Site Name</a>, All right reserved.</span>
                    </div>
                    <div class="col-md-6 text-center text-md-end text-body">
                        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                        Designed By <a class="border-bottom text-primary" href="https://htmlcodex.com">HTML Codex</a> Distributed By <a class="border-bottom text-primary" href="https://themewagon.com">ThemeWagon</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    </body>

</html>