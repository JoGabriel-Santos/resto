<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1.0" />

		<title>Resto</title>

		<!-- bootstrap -->
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
			integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
			crossorigin="anonymous"
			rel="stylesheet"
		/>

		<link rel="stylesheet" href="util/styles/style.css" />
		<link rel="stylesheet" href="util/styles/general.css" />
		<link rel="stylesheet" href="util/styles/queries.css" />
	</head>
	<body>
        <?php
            require_once('./configs/connection.php');
            require_once('./models/client.class.php');
            require_once('./models/shopping_cart.class.php');

            $client_id = $_GET['id'];

            $currentClient = Client::clientInfo($connection, $client_id);
            $itemsQuantity = ShoppingCart::itemsQuantity($connection, $client_id);
            $total = ShoppingCart::total($connection, $client_id);
        ?>

		<header class="header">
			<nav class="main-navigation">
				<ul class="main-navigation-list">
					<li><a class="main-navigation-link" href="#">ABOUT</a></li>
					<li><a class="main-navigation-link" href="#">MENU</a></li>
					<li><a class="main-navigation-link logo" href="#">Resto</a></li>
                    <li><a class="main-navigation-link" href="./signup.php?id=<?= $client_id ?>">EDIT ACCOUNT</a></li>
                    <li><a class="main-navigation-link" href="./signin.php">LOGOUT</a></li>
				</ul>
			</nav>
		</header>

		<main>
			<section class="section-hero">
				<div class="hero">
					<div class="hero-text-box">
						<h1 class="hero-title">
                            Hi <?= $currentClient->name ?>... <br>
                            How about ordering a <span>hamburger</span>?
                        </h1>

						<p class="hero-description">
							The Classic Resto's Hamburger starts with a 100% pure beef patty
							seasoned with just a pinch of salt and pepper.
						</p>

						<a class="button button--full margin-right-sm" href="#">See menu</a>
						<a class="button button--outline" href="#">Local nearby</a>
					</div>

					<div class="hero-image-box">
						<img class="hero-image" src="./util/images/hero.png" alt="" />
					</div>
				</div>
			</section>

			<section class="section-featured">
				<div class="container">
					<h2 class="heading-featured-in">As features in</h2>

					<div class="logos">
						<img src="./util/images/logos/techcrunch.png" alt="" />
						<img src="./util/images/logos/business-insider.png" alt="" />
						<img src="./util/images/logos/the-new-york-times.png" alt="" />
						<img src="./util/images/logos/forbes.png" alt="" />
						<img src="./util/images/logos/usa-today.png" alt="" />
					</div>
				</div>
			</section>

			<section class="section-menu">
				<div class="container center-text">
					<span class="subheading"> house </span>

					<h2 class="heading-primary">specialty</h2>
				</div>

				<div class="container grid grid--center-v grid--2-cols">
					<!-- Step 1 -->
					<div class="step-text-box">
						<p class="step-number">01</p>

						<h3 class="heading-tertiary">Quarter Pounder with Cheese</h3>

						<p class="step-description">
							The mouthwatering perfection starts with two 100% pure all beef patties
							and sauce sandwiched between a sesame seed bun.
						</p>
					</div>

					<div class="step-image-box">
						<img
							class="step-image"
							src="./util/images/hamburger/hamburger_1.png"
							alt=""
						/>
					</div>

					<!-- Step 2 -->
					<div class="step-image-box">
						<img
							class="step-image"
							src="./util/images/hamburger/hamburger_2.png"
							alt=""
						/>
					</div>

					<div class="step-text-box">
						<p class="step-number">02</p>

						<h3 class="heading-tertiary">Double Cheeseburger</h3>

						<p class="step-description">
							Ever wondered what's on a Double Cheeseburger? The Resto's Double
							Cheeseburger is a 100% beef burger with a taste like no other.
						</p>
					</div>

					<!-- Step 3 -->
					<div class="step-text-box">
						<p class="step-number">03</p>

						<h3 class="heading-tertiary">Double Quarter Pounder</h3>

						<p class="step-description">
							Each Double Quarter Pounder with Cheese features two quarter pound 100%
							fresh beef burger patties that are hot, deliciously juicy and cooked
							when you order.
						</p>
					</div>

					<div class="step-image-box">
						<img
							class="step-image"
							src="./util/images/hamburger/hamburger_3.png"
							alt=""
						/>
					</div>
				</div>
			</section>

			<section class="products grid grid--5-cols">
				<div class="container center-text">
					<span class="subheading"> today's </span>

					<h2 class="heading-primary">menu</h2>
				</div>

				<div class="container grid grid--center-v grid--3-cols">

                    <?php
                        require_once('./configs/connection.php');
                        require_once('./models/product.class.php');

                        $products = Product::productInfo($connection);

                        foreach ($products as $product) {
                    ?>

                        <div class="meal">
                            <img class="meal-image" src="<?= $product->product_image ?>" alt="" />

                            <div class="meal-content">
                                <div class="content">
                                    <h3 class="heading-primary--menu"><?= $product->product_name ?></h3>
                                    <p class="heading-secondary--menu">$ <?= $product->price ?></p>
                                </div>
                                

                                <form action="./backend/sale.php?client_id=<?= $currentClient->id ?>&product_id=<?= $product->id ?>" method="post">
                                    <div class="menu-quantity">
                                        <select id="select-where" name="quantity" required>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>

                                    <button class="button button--full">Buy</button>
                                </form>
                            </div>
                        </div> 

                    <?php } ?>
				</div>
			</section>

            <section class="section-menu">
				<div class="container center-text">
					<span class="subheading"> You have <?= $itemsQuantity ?? 0 ?> items in your shopping cart </span>

					<h2 class="heading-primary">Total: $<?= $total ?? 0 ?></h2>
                    
                    <a class="button button--full margin-right-sm" href="./backend/checkout.php?client_id=<?= $client_id ?>">Checkout</a>
				</div>
            </section>

		</main>

		<footer class="footer">
			<div class="container grid grid--footer grid--5-cols">
				<div class="logo-column">
					<a class="logo logo--small" href="#">Resto</a>

					<ul class="social-links">
						<li>
							<a class="footer-link" href="#">
								<ion-icon class="social-icon" name="logo-instagram"></ion-icon>
							</a>
						</li>

						<li>
							<a class="footer-link" href="#">
								<ion-icon class="social-icon" name="logo-facebook"></ion-icon>
							</a>
						</li>

						<li>
							<a class="footer-link" href="#">
								<ion-icon class="social-icon" name="logo-twitter"></ion-icon>
							</a>
						</li>
					</ul>

					<p class="copyright">
						Copyright &copy; 2022 by Resto, Inc. All rights reserved
					</p>
				</div>

				<div class="address-column">
					<p class="footer-heading">Contact us</p>

					<address class="contacts">
						<p class="contacts-add">
							623 Harrison St., 2nd Floor, San Francisco, CA 94107
						</p>

						<p class="contacts-tel-email">
							<a class="footer-link" href="tel:415-201-6370">415-201-6370</a><br />
							<a class="footer-link" href="mailto:hello@omnifood.com"
								>hello@resto.com</a
							>
						</p>
					</address>
				</div>

				<nav class="nav-column">
					<p class="footer-heading">Account</p>

					<ul class="footer-navigation">
						<li><a class="footer-link" href="#">Create account</a></li>
						<li><a class="footer-link" href="#">Sign in</a></li>
						<li><a class="footer-link" href="#">iOS app</a></li>
						<li><a class="footer-link" href="#">Android app</a></li>
					</ul>
				</nav>

				<nav class="nav-column">
					<p class="footer-heading">Company</p>

					<ul class="footer-navigation">
						<li><a class="footer-link" href="#">About Resto</a></li>
						<li><a class="footer-link" href="#">For Business</a></li>
						<li><a class="footer-link" href="#">Cooking partners</a></li>
						<li><a class="footer-link" href="#">Careers</a></li>
					</ul>
				</nav>

				<nav class="nav-column">
					<p class="footer-heading">Resources</p>

					<ul class="footer-navigation">
						<li><a class="footer-link" href="#">Recipe directory</a></li>
						<li><a class="footer-link" href="#">Help center</a></li>
						<li><a class="footer-link" href="#">Privacy & terms</a></li>
					</ul>
				</nav>
			</div>
		</footer>

		<!-- icons -->
		<script
			type="module"
			src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
		></script>
		<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	</body>
</html>
