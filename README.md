<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/><title>Documentation API</title><style>
/* cspell:disable-file */
/* webkit printing magic: print all background colors */
html {
	-webkit-print-color-adjust: exact;
}
* {
	box-sizing: border-box;
	-webkit-print-color-adjust: exact;
}

html,
body {
	margin: 0;
	padding: 0;
}
@media only screen {
	body {
		margin: 2em auto;
		max-width: 900px;
		color: rgb(55, 53, 47);
	}
}

body {
	line-height: 1.5;
	white-space: pre-wrap;
}

a,
a.visited {
	color: inherit;
	text-decoration: underline;
}

.pdf-relative-link-path {
	font-size: 80%;
	color: #444;
}

h1,
h2,
h3 {
	letter-spacing: -0.01em;
	line-height: 1.2;
	font-weight: 600;
	margin-bottom: 0;
}

.page-title {
	font-size: 2.5rem;
	font-weight: 700;
	margin-top: 0;
	margin-bottom: 0.75em;
}

h1 {
	font-size: 1.875rem;
	margin-top: 1.875rem;
}

h2 {
	font-size: 1.5rem;
	margin-top: 1.5rem;
}

h3 {
	font-size: 1.25rem;
	margin-top: 1.25rem;
}

.source {
	border: 1px solid #ddd;
	border-radius: 3px;
	padding: 1.5em;
	word-break: break-all;
}

.callout {
	border-radius: 3px;
	padding: 1rem;
}

figure {
	margin: 1.25em 0;
	page-break-inside: avoid;
}

figcaption {
	opacity: 0.5;
	font-size: 85%;
	margin-top: 0.5em;
}

mark {
	background-color: transparent;
}

.indented {
	padding-left: 1.5em;
}

hr {
	background: transparent;
	display: block;
	width: 100%;
	height: 1px;
	visibility: visible;
	border: none;
	border-bottom: 1px solid rgba(55, 53, 47, 0.09);
}

img {
	max-width: 100%;
}

@media only print {
	img {
		max-height: 100vh;
		object-fit: contain;
	}
}

@page {
	margin: 1in;
}

.collection-content {
	font-size: 0.875rem;
}

.column-list {
	display: flex;
	justify-content: space-between;
}

.column {
	padding: 0 1em;
}

.column:first-child {
	padding-left: 0;
}

.column:last-child {
	padding-right: 0;
}

.table_of_contents-item {
	display: block;
	font-size: 0.875rem;
	line-height: 1.3;
	padding: 0.125rem;
}

.table_of_contents-indent-1 {
	margin-left: 1.5rem;
}

.table_of_contents-indent-2 {
	margin-left: 3rem;
}

.table_of_contents-indent-3 {
	margin-left: 4.5rem;
}

.table_of_contents-link {
	text-decoration: none;
	opacity: 0.7;
	border-bottom: 1px solid rgba(55, 53, 47, 0.18);
}

table,
th,
td {
	border: 1px solid rgba(55, 53, 47, 0.09);
	border-collapse: collapse;
}

table {
	border-left: none;
	border-right: none;
}

th,
td {
	font-weight: normal;
	padding: 0.25em 0.5em;
	line-height: 1.5;
	min-height: 1.5em;
	text-align: left;
}

th {
	color: rgba(55, 53, 47, 0.6);
}

ol,
ul {
	margin: 0;
	margin-block-start: 0.6em;
	margin-block-end: 0.6em;
}

li > ol:first-child,
li > ul:first-child {
	margin-block-start: 0.6em;
}

ul > li {
	list-style: disc;
}

ul.to-do-list {
	padding-inline-start: 0;
}

ul.to-do-list > li {
	list-style: none;
}

.to-do-children-checked {
	text-decoration: line-through;
	opacity: 0.375;
}

ul.toggle > li {
	list-style: none;
}

ul {
	padding-inline-start: 1.7em;
}

ul > li {
	padding-left: 0.1em;
}

ol {
	padding-inline-start: 1.6em;
}

ol > li {
	padding-left: 0.2em;
}

.mono ol {
	padding-inline-start: 2em;
}

.mono ol > li {
	text-indent: -0.4em;
}

.toggle {
	padding-inline-start: 0em;
	list-style-type: none;
}

/* Indent toggle children */
.toggle > li > details {
	padding-left: 1.7em;
}

.toggle > li > details > summary {
	margin-left: -1.1em;
}

.selected-value {
	display: inline-block;
	padding: 0 0.5em;
	background: rgba(206, 205, 202, 0.5);
	border-radius: 3px;
	margin-right: 0.5em;
	margin-top: 0.3em;
	margin-bottom: 0.3em;
	white-space: nowrap;
}

.collection-title {
	display: inline-block;
	margin-right: 1em;
}

.page-description {
    margin-bottom: 2em;
}

.simple-table {
	margin-top: 1em;
	font-size: 0.875rem;
	empty-cells: show;
}
.simple-table td {
	height: 29px;
	min-width: 120px;
}

.simple-table th {
	height: 29px;
	min-width: 120px;
}

.simple-table-header-color {
	background: rgb(247, 246, 243);
	color: black;
}
.simple-table-header {
	font-weight: 500;
}

time {
	opacity: 0.5;
}

.icon {
	display: inline-block;
	max-width: 1.2em;
	max-height: 1.2em;
	text-decoration: none;
	vertical-align: text-bottom;
	margin-right: 0.5em;
}

img.icon {
	border-radius: 3px;
}

.user-icon {
	width: 1.5em;
	height: 1.5em;
	border-radius: 100%;
	margin-right: 0.5rem;
}

.user-icon-inner {
	font-size: 0.8em;
}

.text-icon {
	border: 1px solid #000;
	text-align: center;
}

.page-cover-image {
	display: block;
	object-fit: cover;
	width: 100%;
	max-height: 30vh;
}

.page-header-icon {
	font-size: 3rem;
	margin-bottom: 1rem;
}

.page-header-icon-with-cover {
	margin-top: -0.72em;
	margin-left: 0.07em;
}

.page-header-icon img {
	border-radius: 3px;
}

.link-to-page {
	margin: 1em 0;
	padding: 0;
	border: none;
	font-weight: 500;
}

p > .user {
	opacity: 0.5;
}

td > .user,
td > time {
	white-space: nowrap;
}

input[type="checkbox"] {
	transform: scale(1.5);
	margin-right: 0.6em;
	vertical-align: middle;
}

p {
	margin-top: 0.5em;
	margin-bottom: 0.5em;
}

.image {
	border: none;
	margin: 1.5em 0;
	padding: 0;
	border-radius: 0;
	text-align: center;
}

.code,
code {
	background: rgba(135, 131, 120, 0.15);
	border-radius: 3px;
	padding: 0.2em 0.4em;
	border-radius: 3px;
	font-size: 85%;
	tab-size: 2;
}

code {
	color: #eb5757;
}

.code {
	padding: 1.5em 1em;
}

.code-wrap {
	white-space: pre-wrap;
	word-break: break-all;
}

.code > code {
	background: none;
	padding: 0;
	font-size: 100%;
	color: inherit;
}

blockquote {
	font-size: 1.25em;
	margin: 1em 0;
	padding-left: 1em;
	border-left: 3px solid rgb(55, 53, 47);
}

.bookmark {
	text-decoration: none;
	max-height: 8em;
	padding: 0;
	display: flex;
	width: 100%;
	align-items: stretch;
}

.bookmark-title {
	font-size: 0.85em;
	overflow: hidden;
	text-overflow: ellipsis;
	height: 1.75em;
	white-space: nowrap;
}

.bookmark-text {
	display: flex;
	flex-direction: column;
}

.bookmark-info {
	flex: 4 1 180px;
	padding: 12px 14px 14px;
	display: flex;
	flex-direction: column;
	justify-content: space-between;
}

.bookmark-image {
	width: 33%;
	flex: 1 1 180px;
	display: block;
	position: relative;
	object-fit: cover;
	border-radius: 1px;
}

.bookmark-description {
	color: rgba(55, 53, 47, 0.6);
	font-size: 0.75em;
	overflow: hidden;
	max-height: 4.5em;
	word-break: break-word;
}

.bookmark-href {
	font-size: 0.75em;
	margin-top: 0.25em;
}

.sans { font-family: ui-sans-serif, -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, "Apple Color Emoji", Arial, sans-serif, "Segoe UI Emoji", "Segoe UI Symbol"; }
.code { font-family: "SFMono-Regular", Menlo, Consolas, "PT Mono", "Liberation Mono", Courier, monospace; }
.serif { font-family: Lyon-Text, Georgia, ui-serif, serif; }
.mono { font-family: iawriter-mono, Nitti, Menlo, Courier, monospace; }
.pdf .sans { font-family: Inter, ui-sans-serif, -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, "Apple Color Emoji", Arial, sans-serif, "Segoe UI Emoji", "Segoe UI Symbol", 'Twemoji', 'Noto Color Emoji', 'Noto Sans CJK JP'; }
.pdf:lang(zh-CN) .sans { font-family: Inter, ui-sans-serif, -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, "Apple Color Emoji", Arial, sans-serif, "Segoe UI Emoji", "Segoe UI Symbol", 'Twemoji', 'Noto Color Emoji', 'Noto Sans CJK SC'; }
.pdf:lang(zh-TW) .sans { font-family: Inter, ui-sans-serif, -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, "Apple Color Emoji", Arial, sans-serif, "Segoe UI Emoji", "Segoe UI Symbol", 'Twemoji', 'Noto Color Emoji', 'Noto Sans CJK TC'; }
.pdf:lang(ko-KR) .sans { font-family: Inter, ui-sans-serif, -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, "Apple Color Emoji", Arial, sans-serif, "Segoe UI Emoji", "Segoe UI Symbol", 'Twemoji', 'Noto Color Emoji', 'Noto Sans CJK KR'; }
.pdf .code { font-family: Source Code Pro, "SFMono-Regular", Menlo, Consolas, "PT Mono", "Liberation Mono", Courier, monospace, 'Twemoji', 'Noto Color Emoji', 'Noto Sans Mono CJK JP'; }
.pdf:lang(zh-CN) .code { font-family: Source Code Pro, "SFMono-Regular", Menlo, Consolas, "PT Mono", "Liberation Mono", Courier, monospace, 'Twemoji', 'Noto Color Emoji', 'Noto Sans Mono CJK SC'; }
.pdf:lang(zh-TW) .code { font-family: Source Code Pro, "SFMono-Regular", Menlo, Consolas, "PT Mono", "Liberation Mono", Courier, monospace, 'Twemoji', 'Noto Color Emoji', 'Noto Sans Mono CJK TC'; }
.pdf:lang(ko-KR) .code { font-family: Source Code Pro, "SFMono-Regular", Menlo, Consolas, "PT Mono", "Liberation Mono", Courier, monospace, 'Twemoji', 'Noto Color Emoji', 'Noto Sans Mono CJK KR'; }
.pdf .serif { font-family: PT Serif, Lyon-Text, Georgia, ui-serif, serif, 'Twemoji', 'Noto Color Emoji', 'Noto Serif CJK JP'; }
.pdf:lang(zh-CN) .serif { font-family: PT Serif, Lyon-Text, Georgia, ui-serif, serif, 'Twemoji', 'Noto Color Emoji', 'Noto Serif CJK SC'; }
.pdf:lang(zh-TW) .serif { font-family: PT Serif, Lyon-Text, Georgia, ui-serif, serif, 'Twemoji', 'Noto Color Emoji', 'Noto Serif CJK TC'; }
.pdf:lang(ko-KR) .serif { font-family: PT Serif, Lyon-Text, Georgia, ui-serif, serif, 'Twemoji', 'Noto Color Emoji', 'Noto Serif CJK KR'; }
.pdf .mono { font-family: PT Mono, iawriter-mono, Nitti, Menlo, Courier, monospace, 'Twemoji', 'Noto Color Emoji', 'Noto Sans Mono CJK JP'; }
.pdf:lang(zh-CN) .mono { font-family: PT Mono, iawriter-mono, Nitti, Menlo, Courier, monospace, 'Twemoji', 'Noto Color Emoji', 'Noto Sans Mono CJK SC'; }
.pdf:lang(zh-TW) .mono { font-family: PT Mono, iawriter-mono, Nitti, Menlo, Courier, monospace, 'Twemoji', 'Noto Color Emoji', 'Noto Sans Mono CJK TC'; }
.pdf:lang(ko-KR) .mono { font-family: PT Mono, iawriter-mono, Nitti, Menlo, Courier, monospace, 'Twemoji', 'Noto Color Emoji', 'Noto Sans Mono CJK KR'; }
.highlight-default {
	color: rgba(55, 53, 47, 1);
}
.highlight-gray {
	color: rgba(120, 119, 116, 1);
	fill: rgba(120, 119, 116, 1);
}
.highlight-brown {
	color: rgba(159, 107, 83, 1);
	fill: rgba(159, 107, 83, 1);
}
.highlight-orange {
	color: rgba(217, 115, 13, 1);
	fill: rgba(217, 115, 13, 1);
}
.highlight-yellow {
	color: rgba(203, 145, 47, 1);
	fill: rgba(203, 145, 47, 1);
}
.highlight-teal {
	color: rgba(68, 131, 97, 1);
	fill: rgba(68, 131, 97, 1);
}
.highlight-blue {
	color: rgba(51, 126, 169, 1);
	fill: rgba(51, 126, 169, 1);
}
.highlight-purple {
	color: rgba(144, 101, 176, 1);
	fill: rgba(144, 101, 176, 1);
}
.highlight-pink {
	color: rgba(193, 76, 138, 1);
	fill: rgba(193, 76, 138, 1);
}
.highlight-red {
	color: rgba(212, 76, 71, 1);
	fill: rgba(212, 76, 71, 1);
}
.highlight-gray_background {
	background: rgba(241, 241, 239, 1);
}
.highlight-brown_background {
	background: rgba(244, 238, 238, 1);
}
.highlight-orange_background {
	background: rgba(251, 236, 221, 1);
}
.highlight-yellow_background {
	background: rgba(251, 243, 219, 1);
}
.highlight-teal_background {
	background: rgba(237, 243, 236, 1);
}
.highlight-blue_background {
	background: rgba(231, 243, 248, 1);
}
.highlight-purple_background {
	background: rgba(244, 240, 247, 0.8);
}
.highlight-pink_background {
	background: rgba(249, 238, 243, 0.8);
}
.highlight-red_background {
	background: rgba(253, 235, 236, 1);
}
.block-color-default {
	color: inherit;
	fill: inherit;
}
.block-color-gray {
	color: rgba(120, 119, 116, 1);
	fill: rgba(120, 119, 116, 1);
}
.block-color-brown {
	color: rgba(159, 107, 83, 1);
	fill: rgba(159, 107, 83, 1);
}
.block-color-orange {
	color: rgba(217, 115, 13, 1);
	fill: rgba(217, 115, 13, 1);
}
.block-color-yellow {
	color: rgba(203, 145, 47, 1);
	fill: rgba(203, 145, 47, 1);
}
.block-color-teal {
	color: rgba(68, 131, 97, 1);
	fill: rgba(68, 131, 97, 1);
}
.block-color-blue {
	color: rgba(51, 126, 169, 1);
	fill: rgba(51, 126, 169, 1);
}
.block-color-purple {
	color: rgba(144, 101, 176, 1);
	fill: rgba(144, 101, 176, 1);
}
.block-color-pink {
	color: rgba(193, 76, 138, 1);
	fill: rgba(193, 76, 138, 1);
}
.block-color-red {
	color: rgba(212, 76, 71, 1);
	fill: rgba(212, 76, 71, 1);
}
.block-color-gray_background {
	background: rgba(241, 241, 239, 1);
}
.block-color-brown_background {
	background: rgba(244, 238, 238, 1);
}
.block-color-orange_background {
	background: rgba(251, 236, 221, 1);
}
.block-color-yellow_background {
	background: rgba(251, 243, 219, 1);
}
.block-color-teal_background {
	background: rgba(237, 243, 236, 1);
}
.block-color-blue_background {
	background: rgba(231, 243, 248, 1);
}
.block-color-purple_background {
	background: rgba(244, 240, 247, 0.8);
}
.block-color-pink_background {
	background: rgba(249, 238, 243, 0.8);
}
.block-color-red_background {
	background: rgba(253, 235, 236, 1);
}
.select-value-color-uiBlue { background-color: rgba(35, 131, 226, .07); }
.select-value-color-pink { background-color: rgba(245, 224, 233, 1); }
.select-value-color-purple { background-color: rgba(232, 222, 238, 1); }
.select-value-color-green { background-color: rgba(219, 237, 219, 1); }
.select-value-color-gray { background-color: rgba(227, 226, 224, 1); }
.select-value-color-translucentGray { background-color: rgba(255, 255, 255, 0.0375); }
.select-value-color-orange { background-color: rgba(250, 222, 201, 1); }
.select-value-color-brown { background-color: rgba(238, 224, 218, 1); }
.select-value-color-red { background-color: rgba(255, 226, 221, 1); }
.select-value-color-yellow { background-color: rgba(253, 236, 200, 1); }
.select-value-color-blue { background-color: rgba(211, 229, 239, 1); }
.select-value-color-pageGlass { background-color: undefined; }
.select-value-color-washGlass { background-color: undefined; }

.checkbox {
	display: inline-flex;
	vertical-align: text-bottom;
	width: 16;
	height: 16;
	background-size: 16px;
	margin-left: 2px;
	margin-right: 5px;
}

.checkbox-on {
	background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2216%22%20height%3D%2216%22%20viewBox%3D%220%200%2016%2016%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%0A%3Crect%20width%3D%2216%22%20height%3D%2216%22%20fill%3D%22%2358A9D7%22%2F%3E%0A%3Cpath%20d%3D%22M6.71429%2012.2852L14%204.9995L12.7143%203.71436L6.71429%209.71378L3.28571%206.2831L2%207.57092L6.71429%2012.2852Z%22%20fill%3D%22white%22%2F%3E%0A%3C%2Fsvg%3E");
}

.checkbox-off {
	background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2216%22%20height%3D%2216%22%20viewBox%3D%220%200%2016%2016%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%0A%3Crect%20x%3D%220.75%22%20y%3D%220.75%22%20width%3D%2214.5%22%20height%3D%2214.5%22%20fill%3D%22white%22%20stroke%3D%22%2336352F%22%20stroke-width%3D%221.5%22%2F%3E%0A%3C%2Fsvg%3E");
}
	
</style></head><body><article id="7bd90ddd-ecf4-4ecc-b564-980d00a7d686" class="page sans"><header><h1 class="page-title">Documentation API</h1><p class="page-description"></p></header><div class="page-body"><p id="643132c3-9e9c-487f-a9fa-c298a616346d" class="">
</p><h2 id="bf92f553-d043-4176-a5e9-de4d00e07202" class="">Table des matières</h2><ul id="69a7dc75-fdd4-44d0-a2fb-3c73734407f6" class="bulleted-list"><li style="list-style-type:disc"><a href="notion://www.notion.so/Documentation-API-7bd90dddecf44eccb564980d00a7d686#introduction">Introduction</a></li></ul><ul id="3853fb94-8522-46ff-8cbf-f484e3217b5c" class="bulleted-list"><li style="list-style-type:disc"><a href="notion://www.notion.so/Documentation-API-7bd90dddecf44eccb564980d00a7d686#pr%C3%A9requis">Prérequis</a><ul id="abbb9f8a-4b00-49ce-bb72-ffe95ab91b56" class="bulleted-list"><li style="list-style-type:circle"><a href="notion://www.notion.so/Documentation-API-7bd90dddecf44eccb564980d00a7d686#t%C3%A9l%C3%A9chargement-du-code-source">Téléchargement du code source</a></li></ul><ul id="b10c5ada-ee95-4600-a85a-da11c0013dcb" class="bulleted-list"><li style="list-style-type:circle"><a href="notion://www.notion.so/Documentation-API-7bd90dddecf44eccb564980d00a7d686#configuration-de-lenvironnement">Configuration de l’environnement</a></li></ul><ul id="0ffad38d-933a-41e6-b129-bb77eaac653c" class="bulleted-list"><li style="list-style-type:circle"><a href="notion://www.notion.so/Documentation-API-7bd90dddecf44eccb564980d00a7d686#installation-de-la-base-de-donn%C3%A9es">Installation de la base de données</a></li></ul><ul id="9ec10270-f18b-4d45-aa78-0388c7c6855a" class="bulleted-list"><li style="list-style-type:circle"><a href="notion://www.notion.so/Documentation-API-7bd90dddecf44eccb564980d00a7d686#remplir-les-informations-concernant-votre-base-de-donn%C3%A9es">Remplir les informations concernant votre base de données</a></li></ul><ul id="e73f2f1e-5440-4c02-89a8-4017f86483f8" class="bulleted-list"><li style="list-style-type:circle"><a href="notion://www.notion.so/Documentation-API-7bd90dddecf44eccb564980d00a7d686#remplir-les-informations-concernant-les-cl%C3%A9s-des-services-api">Remplir les informations concernant les clés des services API</a></li></ul><ul id="8930c073-abe6-4396-932a-d5661651ae4d" class="bulleted-list"><li style="list-style-type:circle"><a href="notion://www.notion.so/Documentation-API-7bd90dddecf44eccb564980d00a7d686#remplir-votre-cl%C3%A9-de-secret-de-token">Remplir votre clé de secret de token</a></li></ul><ul id="3f44f429-b14a-4b73-adb9-e72eeb516cb2" class="bulleted-list"><li style="list-style-type:circle"><a href="notion://www.notion.so/Documentation-API-7bd90dddecf44eccb564980d00a7d686#installer-les-d%C3%A9pendances-du-projet">Installer les dépendances du projet</a></li></ul><ul id="97a8fb33-eeea-4d60-b7a2-e782a25aee7a" class="bulleted-list"><li style="list-style-type:circle"><a href="notion://www.notion.so/Documentation-API-7bd90dddecf44eccb564980d00a7d686#lancement-du-serveur">Lancement du serveur</a></li></ul></li></ul><ul id="3d5f16c9-b2bb-4d30-bfee-733eb19289ea" class="bulleted-list"><li style="list-style-type:disc"><a href="notion://www.notion.so/Documentation-API-7bd90dddecf44eccb564980d00a7d686#configuration-de-postman">Configuration de Postman</a></li></ul><ul id="c5488573-0a49-4ff0-9f85-87e5576f2b07" class="bulleted-list"><li style="list-style-type:disc"><a href="notion://www.notion.so/Documentation-API-7bd90dddecf44eccb564980d00a7d686#tester">Tester</a></li></ul><h2 id="c89482c2-2f33-4ac1-b09b-6efa29a8a8d0" class="">Introduction</h2><p id="d7e3045a-897b-4d71-afd4-77357e320ddb" class="">Bienvenue dans la documentation de l&#x27;API Laravel. Cette API a été développée par Hugo Clément en PHP utilisant le Framework Laravel.</p><h2 id="bb1dc1b9-b3f7-483d-828e-b4a83623df60" class="">Prérequis</h2><p id="d02c57f8-9b96-4c2b-9568-2d7ebeb53049" class="">Avant de commencer à utiliser l&#x27;API, assurez-vous d&#x27;avoir les éléments suivants :</p><ul id="1c284bff-4fdd-458c-941b-09df4633b793" class="bulleted-list"><li style="list-style-type:disc">PHP (CLI) - 8.2.0</li></ul><ul id="033d4ae1-2d2b-4248-8676-957e76eeecf0" class="bulleted-list"><li style="list-style-type:disc">Composer - 2.6.4</li></ul><ul id="8180e88f-983a-477d-9dd6-8b89b5b3b2e9" class="bulleted-list"><li style="list-style-type:disc">Laravel Framwork - 10.28.0</li></ul><ul id="cbd870b3-d477-4f98-b517-5ebc212389e8" class="bulleted-list"><li style="list-style-type:disc">phpMyAdmin - 5.2</li></ul><ul id="c6ddd909-d7ab-47e8-adb0-35d5dbc40049" class="bulleted-list"><li style="list-style-type:disc">MySQL - 8.0.31</li></ul><ul id="23c128c1-4094-46b9-abc2-9d97711648bc" class="bulleted-list"><li style="list-style-type:disc">Postman 10.20.0</li></ul><h2 id="f3f3aeea-4e45-498a-8bf5-6f14adea0813" class="">Installation</h2><p id="00e13d11-c777-41bb-9f27-4b60e2446736" class="">Pour installer l&#x27;API, suivez les étapes suivantes :</p><h3 id="c495130f-2957-4e24-abca-ff120356bbb5" class="">Téléchargement du code source</h3><p id="d922eb8e-2b75-4275-89a0-23c71f9afbbd" class="">Clonez le dépôt depuis GitHub</p><pre id="07d794e8-422b-4b8e-bfe2-b6babe48f396" class="code code-wrap"><code>git clone https://github.com/HugoClemt/api-openai
cd api-openai</code></pre><h3 id="9a0cee8a-7813-46f6-b722-e7cd052511e1" class="">Configuration de l’environnement</h3><p id="3f0cc4be-db30-40b1-a5ba-0d432447940f" class="">Copiez le fichier d’environnement et configurez les paramètres nécessaires</p><pre id="c422e9e4-8e7b-472e-aadb-c1e52de58001" class="code"><code>cp .env.example .env</code></pre><p id="1a5cd142-2f9d-4670-a952-1ab110e0d925" class="">
</p><p id="d087d9ce-d007-47a7-bf7a-ad0650b1c15f" class="">Générer votre clé d’application Laravel</p><pre id="42352a90-a172-4348-bc39-8b46d6f5f283" class="code"><code>php artisan key:generate</code></pre><p id="f2a0c411-cc3d-43fa-a02a-6aeffc23bce2" class="">Cette commande permet aussi de régénérer une nouvelle clé Laravel</p><p id="6f14e0a1-c45c-42e9-aa25-d723e768bbf3" class="">
</p><p id="d965f9f1-cd02-4fcb-8d5b-bcb9fd54a67e" class="">Installer la base de données dans votre MySQL<div class="indented"><p id="13e9dee8-3406-474d-80e4-133b1fb8a0a3" class="">Pour cela, il vous suffit de télécharger le fichier “api_openai.sql”</p><figure id="a0212629-86f6-42f5-b632-d40448d740bd"><div class="block-color-gray_background source"><a href="Documentation%20API%207bd90dddecf44eccb564980d00a7d686/api_openai.sql">api_openai.sql</a></div></figure><p id="619848c3-e1b0-49b4-a303-808aa84f7aca" class="">
</p><p id="20cbaf8e-0d8f-4521-aa14-485f7375679d" class="">Dans MySQL, il faut créet une base de données, soit avec l’interface graphique soit en ligne de commande</p><pre id="77b6cc10-f0cf-42e3-ba6f-af3298a1d61e" class="code"><code>CREATE DATABASE api_openai;</code></pre><p id="b742f95c-8350-47a6-b7da-4bc45603a8f6" class="">
</p><p id="e76fb6f6-60c7-4fea-a6ca-3c6460120a85" class="">Et importer le fichier, soit avec l’interface graphique soit en ligne de commande</p><pre id="175abfe4-dbbd-4614-a7a0-ea1f00d4a40b" class="code"><code>mysql -u root -p api_openai &lt; chemin/vers/le_fichier.sql</code></pre><p id="7fa3ff21-2c2e-4ac9-9085-bab4cecf97d2" class="">Assurez-vous de remplacer “chemin/vers/le_fichier.sql” par le chemin et le nom du fichier de la base de données</p><p id="d1788789-4d74-4142-a3a3-733d07479cb3" class="">
</p></div></p><p id="aa698736-aed2-460b-9edb-f49aa8107204" class="">Remplir les informations concernant votre base de données dans votre .env</p><pre id="d420d351-34f4-40b9-aef9-a7109be3ced6" class="code"><code>DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password</code></pre><p id="7a730ea1-9709-4ea2-a4b0-0fb1bbf7e61f" class="">Assurez-vous de bien remplacer “your_database_name” par le nom de votre base de données que vous avez créer précédemment ainsi que “your_database_user” et “your_database_password” par les information du compte MySQL</p><p id="9f73a548-30a5-491e-b435-3c26bab06a6e" class="">
</p><p id="b76248f4-5867-4f5f-8437-988e50a4fb25" class="">Remplir les informations concernant les key des service API utiliser, notamment OpenAi et Stable DIffusion dans votre .env</p><pre id="3a99dc56-bd41-4510-9e44-c804362f7a70" class="code"><code>OPENAI_API_KEY=your_key_api_open_ai
STABLE_API_KEY=your_key_api_stable_diffusion</code></pre><p id="69ad7575-8160-4f12-b2a7-8cebd75159c1" class="">La clé API d’OpenAi, vous pouvez la récupérer sur votre compte OpenAi en accédant à la page API</p><p id="c9b9ba54-a1bb-4c26-82ba-0884234fc9f1" class="">La clé API de Stable Dffusion, vous pouvez la récupérer sur votre compte Clipdrop en accédant à la page API</p><p id="6944e2de-37f0-4441-b83a-82cf7b83d60f" class="">
</p><p id="72db1290-09d4-4d78-bd97-d29149eabb93" class="">Remplir votre clé de secret de token</p><pre id="c71b62c5-f990-4647-8321-c013aa901048" class="code"><code>SECRET_KEY_TOKEN=</code></pre><p id="10b87d31-c2e0-404e-ac2c-c4e6e845108c" class="">
</p><p id="664b998c-a9c5-4d23-8074-d76a1560cf80" class="">Installer les dépendances du projet</p><pre id="9e922821-74e1-46b3-b0be-ed5170a8c71a" class="code"><code>composer install</code></pre><p id="a105fc46-0ade-4ebc-9e8f-fa789ed783ed" class="">
</p><p id="cf13a860-a1b9-4fbf-ad09-ae42a4e8267a" class="">Lancement du serveur</p><pre id="7b726829-515c-4a36-94c9-d5913c6b0cdd" class="code"><code>php artisan serve</code></pre><p id="a77084d3-f0bf-4c6b-9315-73d9d4f1555d" class="">
</p><p id="f996910e-c2d9-462d-819c-098618d0e7b4" class="">Une fois cette l’environnement configurer, l’API sera accessible a cette adresse </p><p id="3eac4cd2-9b4d-4836-9592-1cf7f9b1c2e7" class=""><a href="http://localhost:8000">http://localhost:8000</a></p><p id="09c10486-73a0-413a-b92a-da51e3b3c1f2" class="">
</p><h2 id="92916420-42a2-4c19-b8d3-a698f48fed4a" class="">Configuration de Postman</h2><p id="f64da3bc-4ff1-4aeb-8817-3847eaae32f1" class="">Pour effectuer les requête avec l’API, vous aurez besoin de configurer Postman</p><p id="d10a2079-55d9-4d88-8cd2-78b8034a8565" class="">
</p><p id="86a25dda-2fca-477d-9654-27a0c3bdb8e6" class="">Télécharger le fichier API OpenAi.postman_collection.json</p><figure id="650b1323-8c57-470f-87c4-ab7fabc2a0c1"><div class="block-color-gray_background source"><a href="Documentation%20API%207bd90dddecf44eccb564980d00a7d686/API_OpenAI.postman_collection.json">API OpenAI.postman_collection.json</a></div></figure><p id="b52476ad-de4f-4474-ba00-133b438fd5c3" class="">
</p><p id="1a538842-bd34-47b9-bcbf-69bba2a68f83" class="">Sur l’interface graphique Postman, cliquer sur “Import” et sélectionner le fichier précédemment télécharger</p><p id="c699861c-ff7f-4f07-98b2-5080961b1f03" class="">
</p><p id="38a01aca-ae02-4d86-8242-0df8f0e8a036" class="">Une fois l’environnement ainsi que Postman et la base de données configurer, vous êtes prêt a utiliser l’API</p><h2 id="1c4d225d-9729-4f13-8fe5-c55e9cc5c972" class="">Tester</h2><p id="d141b731-5218-4a17-b29b-f35bbe47e55b" class="">Pour tester l’API, ouvrez phpMyAdmin, Postman, le serveur php</p><p id="c6cf6732-1e38-4671-ab4e-a09d6e57ec23" class="">
</p><p id="3830fcb1-a781-445f-a05c-459b3dbdf4b3" class="">Tout d’abord fait une requête Token pour avoir un token d’utilisateur.</p><pre id="13f98316-082c-4312-88b5-2a4812206a22" class="code"><code>{
    &quot;login&quot;: &quot;your_identifiant&quot;,
    &quot;password&quot;: &quot;your_password&quot;
}</code></pre><p id="fc14005c-8f6c-47a8-9e85-5ad4e79ba08b" class="">Assurez-vous de bien changer “your_identifient” et “your_password” par vos informations</p><p id="47b29dcd-a14b-45a0-a0a7-88a52b91f07d" class="">Cela est a renseigner dans la parti body de Postman en raw “JSON</p><p id="b32abdb5-fe60-47fb-8edc-416ced7492e7" class="">
</p><p id="2397f914-61c1-4eaf-b790-1b3d68845f56" class="">Une fois votre requête terminé, un token vous sera transmit, vous devez le garder et le renseigner dans la partie Header de postman en rajoutant un champs Authorization avec votre token comme valeur.</p><p id="4f4e2a51-f570-408c-af95-01eadef59343" class="">
</p><p id="f9cb054e-676b-4479-a46a-a4fe10bef3a3" class="">Par la suite, vous pouvez faire les requêtes dans les différent dossier Postman “User”, “Universe” et “Conversation”</p><p id="ee6ceed5-021d-4c24-8900-1ee10bd91350" class="">
</p><p id="f055eff1-772b-4bde-ad7e-bffd959f78f2" class="">
</p><p id="1118cbe3-14b2-42f1-b5a1-1f66ff390d37" class="">
</p></div></article><span class="sans" style="font-size:14px;padding-top:2em"></span></body></html>
