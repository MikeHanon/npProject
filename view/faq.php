<?php $title = 'faq'; 
require_once './config/dbconfig.php';
?>

<?php ob_start(); ?>
<div class="container my-5">

<style>
  .w-10 {
    width: 3rem
  }
</style>

<!--Section: Content-->
<section class="">

  <h6 class="font-weight-normal text-uppercase font-small grey-text mb-4 text-center">FAQ</h6>
  <!-- Section heading -->
  <h3 class="text-center">Service d'aide</h3>
  <hr class="w-10">
  <!-- Section description -->
  <p class="text-center">Got a question? We've got answers. If you have some other questions, see our support center.</p>

  <section class="row">
    <section class="col-md-12 col-lg-10 mx-auto">
    
      <!--Accordion wrapper-->
      <section class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

        <!-- Accordion card -->
        <section class="card border-top border-bottom-0 border-left border-right border-light">

          <!-- Card header -->
          <section class="card-header bg-color border-bottom border-light" role="tab" id="headingOne1">
            <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true"
              aria-controls="collapseOne1">
              <h5 class="white-text font-weight-normal mb-0">
                  Qu'est ce que E-artisanat?<i class="fas fa-angle-down rotate-icon"></i>
              </h5>
            </a>
          </section>

          <!-- Card body -->
          <section id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1"
            data-parent="#accordionEx">
            <section class="thumbnail">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos nemo dolorum tenetur reprehenderit ipsa! Dolor ipsam fugit provident consequatur eos praesentium officia quibusdam fuga, natus quae aliquid quos at aliquam.
Atque aliquam hic sunt tempora sequi omnis cumque! Nobis sit corporis reprehenderit voluptatum impedit quia eaque placeat doloremque eligendi est quibusdam exercitationem in quam unde asperiores quis incidunt, quos eum.
Tempora ullam perferendis, ab, distinctio consequuntur quos ipsum natus alias enim quae, ex possimus esse maiores expedita assumenda! Atque nihil ipsam repellendus nemo eaque fugit deleniti delectus saepe a repellat?
Fugit perferendis, ipsa, nulla et natus itaque eius sit tempore minus accusantium voluptates magnam cumque, sunt nobis inventore doloremque voluptatum officiis dicta quasi quo? Voluptatum cum in facere non qui?
            </section>
          </section>

        </section>
        <!-- Accordion card -->

        <!-- Accordion card -->
        <section class="card border-bottom-0 border-left border-right border-light">

          <!-- Card header -->
          <section class="card-header bg-color border-bottom border-light" role="tab" id="headingTwo2">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2"
              aria-expanded="false" aria-controls="collapseTwo2">
              <h5 class="white-text font-weight-normal mb-0">
                  Facturation et paiement<i class="fas fa-angle-down rotate-icon"></i>
              </h5>
            </a>
          </section>

          <!-- Card body -->
          <section id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2"
            data-parent="#accordionEx">
            <section class="thumbnail ">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos nemo dolorum tenetur reprehenderit ipsa! Dolor ipsam fugit provident consequatur eos praesentium officia quibusdam fuga, natus quae aliquid quos at aliquam.
Atque aliquam hic sunt tempora sequi omnis cumque! Nobis sit corporis reprehenderit voluptatum impedit quia eaque placeat doloremque eligendi est quibusdam exercitationem in quam unde asperiores quis incidunt, quos eum.
Tempora ullam perferendis, ab, distinctio consequuntur quos ipsum natus alias enim quae, ex possimus esse maiores expedita assumenda! Atque nihil ipsam repellendus nemo eaque fugit deleniti delectus saepe a repellat?
Fugit perferendis, ipsa, nulla et natus itaque eius sit tempore minus accusantium voluptates magnam cumque, sunt nobis inventore doloremque voluptatum officiis dicta quasi quo? Voluptatum cum in facere non qui?
            </section>
          </section>

        </section>
        <!-- Accordion card -->

        <!-- Accordion card -->
        <section class="card border-bottom-0 border-left border-right border-light">

          <!-- Card header -->
          <section class="card-header bg-color border-bottom border-light" role="tab" id="headingThree3">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree3"
              aria-expanded="false" aria-controls="collapseThree3">
              <h5 class="white-text font-weight-normal mb-0">
                  J'ai des problème d'images lorsque j'essaie de regarder Kornflix
                  <i class="fas fa-angle-down rotate-icon"></i>
              </h5>
            </a>
          </section>

          <!-- Card body -->
          <section id="collapseThree3" class="collapse" role="tabpanel" aria-labelledby="headingThree3"
            data-parent="#accordionEx">
            <section class="thumbnail ">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos nemo dolorum tenetur reprehenderit ipsa! Dolor ipsam fugit provident consequatur eos praesentium officia quibusdam fuga, natus quae aliquid quos at aliquam.
Atque aliquam hic sunt tempora sequi omnis cumque! Nobis sit corporis reprehenderit voluptatum impedit quia eaque placeat doloremque eligendi est quibusdam exercitationem in quam unde asperiores quis incidunt, quos eum.
Tempora ullam perferendis, ab, distinctio consequuntur quos ipsum natus alias enim quae, ex possimus esse maiores expedita assumenda! Atque nihil ipsam repellendus nemo eaque fugit deleniti delectus saepe a repellat?
Fugit perferendis, ipsa, nulla et natus itaque eius sit tempore minus accusantium voluptates magnam cumque, sunt nobis inventore doloremque voluptatum officiis dicta quasi quo? Voluptatum cum in facere non qui?
                
            </section>
          </section>

        </section>
        <!-- Accordion card -->
        
        <!-- Accordion card -->
        <section class="card border-left border-right border-light">

          <!-- Card header -->
          <section class="card-header bg-color border-bottom border-light" role="tab" id="headingThree4">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree4"
              aria-expanded="false" aria-controls="collapseThree4">
              <h5 class="white-text font-weight-normal mb-0">
                  Je ne parviens pas à m'Identifier <i class="fas fa-angle-down rotate-icon"></i>
              </h5>
            </a>
          </section>

          <!-- Card body -->
          <section id="collapseThree4" class="collapse" role="tabpanel" aria-labelledby="headingThree4"
            data-parent="#accordionEx">
            <section class="thumbnail ">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos nemo dolorum tenetur reprehenderit ipsa! Dolor ipsam fugit provident consequatur eos praesentium officia quibusdam fuga, natus quae aliquid quos at aliquam.
Atque aliquam hic sunt tempora sequi omnis cumque! Nobis sit corporis reprehenderit voluptatum impedit quia eaque placeat doloremque eligendi est quibusdam exercitationem in quam unde asperiores quis incidunt, quos eum.
Tempora ullam perferendis, ab, distinctio consequuntur quos ipsum natus alias enim quae, ex possimus esse maiores expedita assumenda! Atque nihil ipsam repellendus nemo eaque fugit deleniti delectus saepe a repellat?
Fugit perferendis, ipsa, nulla et natus itaque eius sit tempore minus accusantium voluptates magnam cumque, sunt nobis inventore doloremque voluptatum officiis dicta quasi quo? Voluptatum cum in facere non qui?
            </section>
          </section>

        </section>
        <!-- Accordion card -->

      </section>
      <!-- Accordion wrapper -->
      
      
    </section>
  </section>

</section>

</section>
<?php $content = ob_get_clean(); ?>
        <?php require('template.php'); ?>