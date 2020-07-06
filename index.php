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
            <p class="overview__text">Ik ben op zoek naar een nieuwe uitdaging in omgeving Amsterdam.</p>
            <div class="overview__inner-container">
               <h3 class="title--sm">Portfolio</h3>
               <p>Bekijk hier een overzicht van al mijn werk.</p>
               <a href="<?php echo site_url('projects'); ?>" class="link">Bekijk portfolio</a>
            </div>
            <div class="overview__inner-container">
               <h3 class="title--sm">Curriculum Vitae</h3>
               <p>Voor een uitgebreidere kijk op mijn vaardigheden verwijs ik u naar mijn CV.</p>
               <a href="<?php echo site_url(); ?>" class="link">Bekijk CV</a>
            </div>
         </div>
      </div>

      <div class="container recent-projects-container">
         <h3 class="title--sm">Recent werk</h3>
         <p>Hieronder vindt u wat van mijn recente werk.</p>

         <?php $portfolio_items = new WP_Query(array(
            'post_type' => 'project',
            'posts_per_page' => 2,
            'post_status' => 'publish',
            'orderby' => 'rand',
            'order' => 'ASC',
            'post__not_in' => array(get_the_ID())
         )); ?>

         <?php if ($portfolio_items > 0) : ?>
            <div class="recent-projects">
               <h3>Meer projecten</h3>
               <ul class="archive-posts archive-posts--<?php echo get_post_type(); ?>">
                  <?php while ($portfolio_items->have_posts()) : $portfolio_items->the_post(); ?>
                     <li class="archive-post archive-post--<?php echo get_post_type(); ?>">
                        <a href="<?php the_permalink(); ?>" class="archive-post__link">
                           <?php the_post_thumbnail('large', ['class' => 'archive-post__image']); ?>
                        </a>
                     </li>
                  <?php endwhile; ?>
               </ul>
               <a href="<?php echo site_url('projects'); ?>" class="link margin-top--md">Bekijk portfolio</a>
            </div>
         <?php endif; ?>

         <?php wp_reset_query(); ?>


   </main>

   <?php get_template_part('template-parts/footer'); ?>