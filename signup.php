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

            $id = $_GET['id'] ?? null;

            if ($id) {
                $client = Client::clientInfo($connection, $id);
            }
        ?>

		<header class="header">
			<nav class="main-navigation">
				<ul class="main-navigation-list">
					<li><a class="main-navigation-link" href="#">About</a></li>
					<li><a class="main-navigation-link" href="#">Contact</a></li>
					<li><a class="main-navigation-link logo" href="#">Resto</a></li>
					<li><a class="main-navigation-link" href="#">Menu</a></li>
					<li><a class="main-navigation-link" href="#">Reservation</a></li>
				</ul>
			</nav>
		</header>

		<main>
			<section class="section-cta">
				<div class="container">
					<div class="cta">
						<div class="cta-text-box">
							<h2 class="heading-secondary">
                                <?= $id != null ? 'Update registration' : 'Register right now' ?>
                            </h2>

							<p class="cta-text">
								Healthy, tasty and hassle-free meals are waiting for you. Start
								eating well today. You can cancel or pause anytime. And the first
								meal is on us!
							</p>

							<form class="cta-form" action="./backend/<?= $id != null ? 'updateClient' : 'createClient' ?>.php" method="post">
								<div class="cta-form-name">

                                    <?php
                                        if($id) {
                                            echo '<input id="id" name="id" type="hidden" value="' . $id . '">';
                                        }
                                    ?>

									<label for="full-name">Full Name</label>
									<input
										id="full-name"
                                        name="name"
										type="text"
										placeholder="John Smith"
                                        value="<?= $client->name ?? '' ?>"
										required
									/>
								</div>

								<div class="cta-form-email">
									<label for="email-address">Email address</label>
									<input
										id="email-address"
                                        name="email"
										type="email"
										placeholder="johnsmith@gmail.com"
                                        value="<?= $client->email ?? '' ?>"
										required
									/>
								</div>

								<div class="cta-form-email">
									<label for="email-address">Password</label>
									<input
										id="password"
                                        name="password"
										type="password"
										placeholder="qwerty123"
                                        value="<?= $client->password ?? '' ?>"
										required
									/>
								</div>

								<button class="button button--form" type="submit">
                                    <?= $id != null ? 'Update' : 'Sign up now' ?>
                                </button>
							</form>
						</div>

						<div class="cta-image-box" role="img"></div>
					</div>
				</div>
			</section>
		</main>
	</body>
</html>
