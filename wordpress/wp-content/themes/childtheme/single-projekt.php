<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

get_header();
?>
<link rel="stylesheet" href="https://use.typekit.net/icz2yrj.css">

<style>

#enkeltProjekt {
        display: grid;
        grid-template-columns: 100px 100px;
      }

article img {
        border-radius: 5px;
      }

      img {
        max-width: 100%;
        height: auto;
      }



#rundbox {
  border-radius: 25px;
  border: 2px solid #73AD21;
  padding: 20px; 
}

p {
  font-family: zeitung, sans-serif;
  font-weight: 400;
  font-style: normal;
}

h1 {
  font-family: zeitung, sans-serif;
  font-weight: 400;
  font-style: normal;
}

h2 {
  font-family: zeitung, sans-serif;
  font-weight: 400;
  font-style: normal;
}

h3 {
  font-family: zeitung, sans-serif;
  font-weight: 400;
  font-style: normal;
}

</style>



	<div id="primary" class="content-area">
		<main id="main" class="site-main">
<button class="luk">Tilbage</button>
<section class="indhold">

	<article class="enkeltProjekt">
		<section id="singleview">
		
		<img id="pic" src="" alt="">

<div id="rundbox">
	<p id="klassetrin"></p>
	<p id="skolenavn"></p>
	<p id="kontakt"></p>
</div>


<h1></h1>
		<p class="text"></p>

</section>
</article>
</section>		
		</main><!-- #main -->
<script>

	let projekt;
	window.addEventListener("DOMContentLoaded", getJson);

	async function getJson () {
		console.log("id er", <?php echo get_the_ID() ?>);
		//hent en enkelt ret ud fra id'et

		let jsonData = await fetch(`http://louiseskjoldborgbruun.dk/kea/unesco/wordpress/wp-json/wp/v2/projekt/<?php echo get_the_ID() ?>`);
		projekt = await jsonData.json();
		visProjekt();
		}


		//vis data om projektet
		function visProjekt() {
document.querySelector("h1").textContent = projekt.title.rendered;

			document.querySelector("#klassetrin").innerHTML = "Klassetrin: " + projekt.klassetrin;
			document.querySelector("#skolenavn").innerHTML = "Skolenavn: " + projekt.skolenavn;
			document.querySelector("#kontakt").innerHTML = "Kontakt: " + projekt.kontakt;

			document.querySelector("#pic").src = projekt.billede.guid;

			document.querySelector("h2").textContent = projekt.title.rendered;
			document.querySelector(".text").innerHTML = projekt.projektbeskrivelse;

			
		}

document.querySelector(".luk").addEventListener("click", () => {
	history.back();
	//link tilbage til den foregående side på "luk" knappen
})

</script>

	</div><!-- #primary -->

<?php
get_footer();