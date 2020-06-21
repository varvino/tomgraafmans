<head>

   <?php
   wp_head();
   get_template_part('template-parts/header');
   ?>
   <main>

      <div class="container hero-container">
         <h2 class="hero__subtitle">Hallo, ik ben Tom</h2>
         <h1 class="hero__title">Een junior WordPress developer</h1>
      </div>
      <div class="overview-container">
         <div class="container">
            <p class="introduction__text">Ik ben op zoek naar een nieuwe uitdaging in omgeving Amsterdam.</p>
            <div class="margin-bottom--md">
               <h3 class="title title--small">Portfolio</h3>
               <p>Bekijk hier een overzicht van al mijn werk.</p>
               <a href="<?php echo site_url(); ?>" class="link">Bekijk portfolio</a>
            </div>
            <div class="margin-bottom--md">
               <h3 class="title title--small">Curriculum Vitae</h3>
               <p>Voor een uitgebreidere kijk op mijn vaardigheden verwijs ik u naar mijn CV.</p>
               <a href="<?php echo site_url(); ?>" class="link">Bekijk CV</a>
            </div>
         </div>
      </div>

      <div class="container recent-projects-container">
         <h3 class="title title--small">Recent werk</h3>
         <div class="recent-projects">
            <div class="recent-project">
               <img src="<?php echo get_theme_file_uri('/assets/img/project1.jpg'); ?>" alt="Project 1" class="recent-project__image">
            </div>
            <div class="recent-project">
               <img src="<?php echo get_theme_file_uri('/assets/img/project2.jpg'); ?>" alt="Project 2" class="recent-project__image">
            </div>
         </div>
   </main>

   <?php get_template_part('template-parts/footer'); ?>