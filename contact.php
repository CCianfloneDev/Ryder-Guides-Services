<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title> Ryder Guides & Services </title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="styles.css">
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
      <link href='https://fonts.googleapis.com/css2?family=Open+Sans&display=swap' rel='stylesheet'>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/css/lightbox.min.css" rel="stylesheet">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/js/lightbox.min.js"></script>
   </head>
   <body>
      <header>
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.html">Ryder Guides & Services</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav">
                  <li class="nav-item">
                     <a class="nav-link" href="index.html#home">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="index.html#about-us">About Us</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="index.html#services">Services</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="gallery.html">Gallery</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="contact.php">Contact Us</a>
                  </li>
               </ul>
            </div>
         </nav>
      </header>
      <div id="contact-us" class="container">
         <?php if(isset($_GET['email-sent']) && $_GET['email-sent'] == 'true'):?>
         <div class="card fluid alert alert-primary alert-dismissible fade show" role="alert" >
            Thank you for your inquiry! We will get back to you as soon as possible.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <?php elseif(isset($_GET['email-sent']) && $_GET['email-sent'] == 'false'):?>
         <div class="card fluid alert alert-warning alert-dismissible fade show" role="alert" >
            Something went wrong and the email didn't send. Try again and make sure all the fields are full with a valid email. If the issue persists, try again later...
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <?php endif ?>
         <form id="contact-form" method="post" action="submit-form.php">
            <div class="form-group">
               <?php if(isset($_GET['missing-fields']) && $_GET['missing-fields'] == 'true'):?>
               <div class="card fluid alert alert-warning alert-dismissible fade show" role="alert" >
                  You're missing fields...
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <?php endif ?>
               <label for="name">Name:</label>
               <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
               <label for="email">Email:</label>
               <input type="email" class="form-control" id="email" name="email" >
            </div>
            <div class="form-group">
               <label for="phone">Phone Number:</label>
               <input type="tel" class="form-control" id="phone" name="phone" >
            </div>
            <div class="form-group">
               <label for="inquiry">Inquiry:</label>
               <textarea class="form-control" id="inquiry" name="inquiry" rows="5" ></textarea>
            </div>
            <div class="form-group text-center">
               <button type="submit" class="btn btn-primary">Submit</button>
            </div>
         </form>
      </div>
      <script src="Javascript/contact.js"></script>
      <footer id="contact-footer">
         <div class="footer-container">
            <div class="footer-left">
               <p>Copyright &#169;2022 Ryder Guides & Services</p>
               <p>Address: 123 Main St, Anytown USA</p>
               <p>Phone: 204-806-0070</p>
               <p>Email: RyderGuidesAndServices@gmail.com</p>
            </div>
            <div class="social-icons">
               <a href="#facebook"><i class="fab fa-facebook-f"></i></a>
               <a href="#twitter"><i class="fab fa-twitter"></i></a>
               <a href="#instagram"><i class="fab fa-instagram"></i></a>
               <a href="#linkedin"><i class="fab fa-linkedin"></i></a>
            </div>
         </div>
      </footer>
   </body>
</html>