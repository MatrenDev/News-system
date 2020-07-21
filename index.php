<?php 
	require_once 'includes/header.php';
    header('Content-type: text/html; charset=utf-8'); 

    // Po wciśnięciu buttonu 'Zarejestruj'
    if(isset($_POST['register'])) 
    {
        $registerUser = new User();
		$registerUser->register($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['gender'], $_POST['password']);
    }

    // Po wciśnięciu buttonu 'Zaloguj'
    if(isset($_POST['login'])) 
    {
        $loginUser = new User();
        $loginUser->logIn($_POST['email'], $_POST['password']);
    }
?>

<section class="header15 cid-s4PNdjdVmO mbr-parallax-background" id="header15-0">
    <div class="mbr-overlay" style="opacity: 0.3; background-color: rgb(7, 59, 76);"></div>
    <div class="container align-right">
        <div class="row">
            <div class="mbr-white col-lg-8 col-md-7 content-container">
                <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-1"><br>Rejestracja<br>PandaGroup</h1>                
            </div>
            <div class="col-lg-4 col-md-5">
                <div class="form-container">
                    <div class="media-container-column">
					
                        <!--- Formularz rejestracyjny --->
                        <form action="" method="POST" class="mbr-form form-with-styler" data-form-title="Mobirise Form">
						<input type="hidden" name="email" data-form-email="true" value="Csb+Ho+1rES9b15nx2WkWG3yClhvt3a2Lj3l0ZVhyTc3JWUKMMY92OCCkM2xsB0Zt3lKsoN/sBotahRn5stTl38jMAtTTgZfDnYHWY1XJEE2qbXPOyMOYYTrV5Rwl2CX">
            
                            <div class="dragArea row">
                                <div class="col-md-12 form-group " data-for="first_name">
                                    <input type="text" name="first_name" placeholder="Imię" data-form-field="first_name" required="required" class="form-control px-3 display-7" id="first_name-header15-0">
                                </div>
                                <div class="col-md-12 form-group " data-for="last_name">
                                    <input type="text" name="last_name" placeholder="Nazwisko" data-form-field="last_name" required="required" class="form-control px-3 display-7" id="last_name-header15-0">
                                </div>
                                <div class="col-md-12 form-group " data-for="email">
                                    <input type="email" name="email" placeholder="Email" data-form-field="Email" required="required" class="form-control px-3 display-7" id="email-header15-0">
                                </div>
								<div class="col-md-12 form-group " data-for="gender">
                                    <input type="gender" name="gender" placeholder="Płeć" data-form-field="gender" required="required" class="form-control px-3 display-7" id="gender-header15-0">
                                </div>
                                <div class="col-md-12 form-group " data-for="password">
                                    <input type="password" name="password" placeholder="Hasło" data-form-field="password" required="required" class="form-control px-3 display-7" id="password-header15-0">
                                </div>
                                <div class="col-md-12 input-group-btn"><button type="submit" name="register" class="btn btn-secondary btn-form display-4">Zarejestruj</button></div>
                            </div>
                        </form>
                    </div>
					<div class="media-container-column">
					
                        <!--- Formularz logowania --->
                        <form action="" method="POST" class="mbr-form form-with-styler" data-form-title="Mobirise Form">
						<input type="hidden" name="email" data-form-email="true" value="Csb+Ho+1rES9b15nx2WkWG3yClhvt3a2Lj3l0ZVhyTc3JWUKMMY92OCCkM2xsB0Zt3lKsoN/sBotahRn5stTl38jMAtTTgZfDnYHWY1XJEE2qbXPOyMOYYTrV5Rwl2CX">
            
                            <div class="dragArea row">
                                <div class="col-md-12 form-group " data-for="email">
                                    <input type="email" name="email" placeholder="Email" data-form-field="Email" required="required" class="form-control px-3 display-7" id="email-header15-0">
                                </div>
                                <div class="col-md-12 form-group " data-for="password">
                                    <input type="password" name="password" placeholder="Hasło" data-form-field="password" required="required" class="form-control px-3 display-7" id="password-header15-0">
                                </div>
                                <div class="col-md-12 input-group-btn"><button type="submit" name="login" class="btn btn-secondary btn-form display-4">Zaloguj</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mbr-arrow hidden-sm-down" aria-hidden="true">
        <a href="#next">
            <i class="mbri-down mbr-iconfont"></i>
        </a>
    </div>
</section>
<section class="engine"><a href="https://mobirise.info/m">free site design templates</a></section><section class="mbr-section content4 cid-s4PVr8yCEZ" id="content4-a">

    

    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center pb-3 mbr-fonts-style display-2">Daj pomysł i chęć realizacji</h2>
                <h3 class="mbr-section-subtitle align-center mbr-light mbr-fonts-style display-5">Wymieniaj się informacjami z innymi użytkownikami pisząc artykuły na temat Twoich metod spędzania wolnego czasu.</h3>
                
            </div>
        </div>
    </div>
</section>

<section class="mbr-section article content1 cid-s4PNpuNTAP" id="content2-2">

     

    <div class="container">
        <div class="media-container-row">
            <div class="mbr-text col-12 col-md-8 mbr-fonts-style display-7">
                <blockquote> Przykładowa treść dla ogłoszenia.<br>Autor:</blockquote>
            </div>
        </div>
    </div>
</section>

<section once="footers" class="cid-s4PUMkzgMt" id="footer6-9">

    

    

    <div class="container">
        <div class="media-container-row align-center mbr-white">
            <div class="col-12">
                <p class="mbr-text mb-0 mbr-fonts-style display-7">Styl wykonany w oprogramowaniu Mobirise na rzecz zadania rekrutacyjnego.</p>
            </div>
        </div>
    </div>
</section>
  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/parallax/jarallax.min.js"></script>
  <script src="assets/theme/js/script.js"></script>
<?php require_once 'includes/footer.php'; ?>