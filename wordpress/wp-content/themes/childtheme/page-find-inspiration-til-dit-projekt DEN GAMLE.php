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
	<button data-projekter="alle" class="valgt">Alle</button>
	<button data-projekter="indskoling">Indskoling</button>
	<button data-projekter="mellemtrin">Mellemtrin</button>
	<button data-projekter="udskoling">Udskoling</button>
	<button data-projekter="ungdomsuddannelse">Ungdomsuddannelse</button>

</nav>
	<section id="projekt-oversigt"></section>
<h1>Projekter</h1>
</main><!-- #main -->

<template>
	<article>
		<h2></h2>
		<h3 id="klassetrin"></h3>
		<h3 id="verdensmal"></h3>
		<img src="" alt="">
		<p></p>
</article>
</template>


<script>
console.log("henterMitScript");

let projekter = [];

const liste = document.querySelector("#projekt-oversigt");
const skabelon = document.querySelector("template");
let filterProjekt = "alle";
const h1 = document.querySelector("h1");

window.addEventListener("DOMContentLoaded", start);

function start() {
	getJson();
	const filterKnapper = document.querySelectorAll("nav button");
	filterKnapper.forEach(knap => knap.addEventListener("click", filtrerProjekter));
}


function filtrerProjekter() {
	filterProjekt = this.dataset.projekter;
	document.querySelector(".valgt")classList.remove("valgt");
	this.classList.add("valgt")
	visProjekter();
	h1.textContent = this.textContent;
	console.log(this);
}

const url = "http://louiseskjoldborgbruun.dk/kea/unesco/wordpress/wp-json/wp/v2/projekt?per_page=100";
async function getJson() {
console.log("getJson");

	let response = await fetch(url);
	projekter = await response.json();
	visProjekter();
}

function visProjekter () {
	console.log(projekter);

	projekter.forEach(projekt=> {
		if (filter == projekt.projekter || filter == "alle") {
			console.log("Kategori", projekt.projekter);


		const klon = skabelon.cloneNode(true).content;
		klon.querySelector("h2").textContent = projekt.title.rendered;
		klon.querySelector("#klassetrin").textContent = projekt.klassetrin;
		klon.querySelector("#verdensmal").textContent = projekt.verdensmal;
		// klon.querySelector("p").textContent = projekt.projektbeskrivelse;
		klon.querySelector("img").src = projekt.billede.guid;
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