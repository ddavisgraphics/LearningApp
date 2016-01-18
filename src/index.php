<?php
	require_once "includes/engine.php";
	templates::display('header');

	$authorized = LoginAuth::checkAuthorization();
?>

<div class="jumbotron">
 	<h1>Want to learn to program? </h1>
  	<p> Are you ready to jump into a quick learning module that teaches you step-by-step how to use and levearge frameworks to build web applications and teach you programming concepts in the world of web development? If so please select a path using the selection below! </p>
</div>

<div class="row">
  	<div class="col-xs-12 col-md-8">
    	<div class="embed-responsive embed-responsive-16by9">
      		<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/pn-0Aagx4cs?list=PLTBgNwvH0GyxH3WmN-qisKZwLB28aY0F9"></iframe>
    	</div>
  	</div>

  	<div class="col-xs-12 col-md-4">
      	<h2> David J. Davis </h2>

      	<p> I've created this series of courses in part to completing my MFA Thesis, but also because of the journey that I have had from the web.  I've worked as a designer in sign shops, print companies, ad agencies, and in higher education.  It wasn't until I learned about code and basic programming concepts that I found my true interest and passion.  This course is to help designers who want to make that leap and show them it isn't as hard as many will lead you to believe.  </p>

      	<p> <a class="btn btn-primary" href="http://ddavisgraphics.com/#contact" role="button"> Questions? </a></p>
  	</div>
</div>

<div class="row">
  	<div class="col-xs-12 col-md-6">
      	<h2> What is MeteorJS ? </h2>
      	<p> MeteorJS is a fullstack JavaScript framework dedicated to rapid development, easy learning, and user centric applications.  The main driving factor behind meteor is to come up with a framework anybody can use that is as simple as possible.  It uses Node along with other customized features to create a fully deployable web applications.</p><br>

        <p><a class="btn btn-primary" href="/meteor" role="button">MeteorJS (Fullstack JavaScript) </a> </p>
  	</div>
  	<div class="col-xs-12 col-md-6">
       	<h2> What is EngineAPI ? </h2>
       	<p> EngineAPI is a traditional LAMP Stack (Linux, Apache, MySQL, and PHP) that was built for rapid development, secure applications, and freedom to design in many different programming styles.  This framework focuses on these key features to make it easy to use a LAMP stack.</p><br>

        <p><a class="btn btn-primary" href="/engine" role="button">EngineAPI (LAMP Stack) </a></p>
  	</div>
</div>

<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">Data Saves and Tracking</div>

        <div class="panel-body micro-text">
            <p>
                I understanding that this application will track my progress as I continue through this course and that this information will be used as a means for confirming the thesis premis.  My participation in this course will require cookies to be turned on and will require you to have JavaScript enabled.  Only the data set by this application will collected, and only the data from your mouse clicks while inside of this application window will be tracked.  No other data on your system or browser will be accessed.
            </p>
        </div>
    </div>
</div>

<?php
    templates::display('footer');
?>