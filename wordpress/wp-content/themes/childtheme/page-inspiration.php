<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage 
 * @since 
 */


get_header();
?>

<style>
* {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        text-decoration: none;
      }


section {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 10px;
        grid-column: 2/3; /* Placerer vores indhold i midten af vores main grid */
      }

      article {
        padding: 10px;
		border: 10px orange solid;
        border-radius: 5px;
        border-radius: 0px;
        cursor: pointer;
      }

      article img {
        border-radius: 5px;
      }

      img {
        max-width: 100%;
        height: auto;
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
  font-weight: 200;
  font-style: normal;
}

h3 {
  font-family: zeitung, sans-serif;
  font-weight: 200;
  font-style: normal;
}
</style>


	<div id="primary" class="content-area">
	<main id="main" class="site-main">

	<nav>
	<button data-projekt="alle" class="valgt">Alle</button>
	<button data-projekt="9">Indskoling</button>
	<button data-projekt="8">Mellemtrin</button>
	<button data-projekt="7">Udskoling</button>
	<button data-projekt="30">Ungdomsuddannelse</button>

</nav>

	<h1 id="overskrift">PROJEKTER</h1>

	<section id="projekt-oversigt"></section>
	</main><!-- #main -->

<template>
	<article>
		<h2></h2>
		<img src="" alt="">
		<p></p>
</article>
</template>

<script>

// console.log("henterMitScript");

// window.addEventListener("DOMContentLoaded", start);

let projekter;
let categories;
let filter = "alle";
let h1 = document.querySelector("h1")


// function start () {
// 	getJson();
// 	const filterKnapper = document.querySelectorAll("nav button");
// 	filterKnapper.forEach(knap => knap.addEventListener("click", filtrerProjekter));
// }

function addEventListenerToButtons() {

    document.querySelectorAll("nav button").forEach(element => {

    element.addEventListener("click", filtrerProjekter)

    })

    }

function filtrerProjekter() {
	filter = this.dataset.projekt;
	document.querySelector(".valgt").classList.remove("valgt");
	this.classList.add("valgt")
	visProjekter();
	h1.textContent = this.textContent;
	// console.log(this);
	// console.log("filtrerProjekter er valgt")

	console.log(filter)
}

const dbUrl = "http://louiseskjoldborgbruun.dk/kea/unesco/wordpress/wp-json/wp/v2/projekt?per_page=100";
const catUrl = "http://louiseskjoldborgbruun.dk/kea/unesco/wordpress/wp-json/wp/v2/categories?per_page=100"
async function getJson() {

	const data = await fetch(dbUrl);
	const catdata = await fetch(catUrl);

	projekter = await data.json();

	categories = await catdata.json();

	console.log(projekter);

	console.log(categories);

visProjekter();
addEventListenerToButtons();
}

function visProjekter () {
	// console.log(projekter);
let liste = document.querySelector("#projekt-oversigt");
let skabelon = document.querySelector("template");

liste.innerHTML = "";

	projekter.forEach((projekt) => {
		if (filter == "alle" || projekt.categories.includes(parseInt(filter)))  {
			// console.log("Kategori", projekt.projekter);
			// console.log("nu filtrer vi")
			console.log(projekt.categories);


		const klon = skabelon.cloneNode(true).content;
		klon.querySelector("h2").textContent = projekt.title.rendered;
		klon.querySelector("img").src = projekt.billede.guid;
		// klon.querySelector("p").innerHTML = projekt.pris + " kr";
klon.querySelector("article").addEventListener("click", () => {
	location.href = projekt.link;
})

		liste.appendChild(klon);
		}
	})
}

getJson();

</script>
		
</div><!-- #primary -->

<?php
get_footer();
