<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/congfig.css')}}" />
      @stack('style-alt')
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/footer.css')}}" />

    <title>Responsive real estate - ypcode</title>
  </head>
  <body>
    @yield('header')

    <main class="main">
        @yield('content')
    </main>

    <footer class="footer section">
      <div class="footer__container container grid">
        <div>
          <a href="#" class="footer__logo">
            Ho<span>mie</span> <i class="bx bxs-home-heart"></i>
          </a>
          <p class="footer__description">
            Our vision is to make all people <br />
            the best place to live for them.
          </p>
        </div>

        <div class="footer__content">
          <div>
            <h3 class="footer__title">About</h3>

            <ul class="footer__links">
              <li>
                <a href="#" class="footer__link">About Us</a>
              </li>
              <li>
                <a href="#" class="footer__link">Features </a>
              </li>
              <li>
                <a href="#" class="footer__link">News & Blog</a>
              </li>
            </ul>
          </div>
          <div>
            <h3 class="footer__title">Company</h3>

            <ul class="footer__links">
              <li>
                <a href="#" class="footer__link">How We Work? </a>
              </li>
              <li>
                <a href="#" class="footer__link">Capital </a>
              </li>
              <li>
                <a href="#" class="footer__link"> Security</a>
              </li>
            </ul>
          </div>
          <div>
            <h3 class="footer__title">Support</h3>

            <ul class="footer__links">
              <li>
                <a href="#" class="footer__link">FAQs </a>
              </li>
              <li>
                <a href="#" class="footer__link">Support center </a>
              </li>
              <li>
                <a href="#" class="footer__link"> Contact Us</a>
              </li>
            </ul>
          </div>
          <div>
            <h3 class="footer__title">Follow us</h3>

            <ul class="footer__social">
              <a href="#" class="footer__social-link">
                <i class="bx bxl-facebook-circle"></i>
              </a>
              <a href="#" class="footer__social-link">
                <i class="bx bxl-instagram-alt"></i>
              </a>
              <a href="#" class="footer__social-link">
                <i class="bx bxl-pinterest"></i>
              </a>
            </ul>
          </div>
        </div>
      </div>

      <div class="footer__info container">
        <span class="footer__copy"> &#169; ypcode. All rigths reserved </span>
        <div class="footer__privacy">
          <a href="#">Terms & Agreements</a>
          <a href="#">Privacy Policy</a>
        </div>
      </div>
    </footer>
    @stack('script-alt')
  </body>
</html>
