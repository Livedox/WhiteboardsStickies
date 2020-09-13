<!DOCTYPE html>
<html>
<head>
	<title>Whiteboards+Stickies</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@500;700&display=swap" rel="stylesheet"> 
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</head>
<body>
	<div id="app">
		<div class="content">
			<div class="left">
				<div class="logo">		
					<svg width="522" height="520" viewBox="0 0 522 520" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M216.559 123.092C168.486 134.431 -21.7024 237.585 15.8836 436.002C56.7627 651.802 555.68 350.124 507.76 112.625C467.047 -89.1544 139.504 55.6384 102.701 132.978" stroke="#FFB255" stroke-opacity="0.3" stroke-width="20"/>
					</svg>
					<h1><a href="./register.php">Whiteboards<br> + <br>Stickies</a></h1>
				</div>
			</div>
		</div>
		
		<div class="sticker" v-for="sticker in stickers" :class="sticker.cls" :style="sticker.st" style="cursor: auto;">
			<div class="sticker-content">
				{{ sticker.content }}
			</div>
			<div class="sticker-author">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					 viewBox="0 0 464 464" style="enable-background:new 0 0 464 464;" xml:space="preserve">
				<path style="fill:#EFECE8;" d="M56,463.448V368c0-65.816,49.696-119.976,113.6-127.136C149.056,223.256,136,197.176,136,168
					c0-53.016,42.984-96,96-96s96,42.984,96,96c0,29.176-13.056,55.256-33.6,72.864C358.304,248.024,408,302.184,408,368v95.448
					c31.56-3.944,56-30.816,56-63.448V64c0-35.344-28.656-64-64-64H64C28.656,0,0,28.656,0,64v336C0,432.632,24.44,459.504,56,463.448z"
					/>
				<g>
					<path style="fill:#F9EDE0;" d="M408,464v-0.552c-2.624,0.328-5.288,0.552-8,0.552H408z"/>
					<path style="fill:#F9EDE0;" d="M56,464h8c-2.712,0-5.376-0.224-8-0.552V464z"/>
				</g>
				<path style="fill:#C6C3BD;" d="M294.4,240.864C314.944,223.256,328,197.176,328,168c0-53.016-42.984-96-96-96s-96,42.984-96,96
					c0,29.176,13.056,55.256,33.6,72.864C105.696,248.024,56,302.184,56,368v95.448c2.624,0.328,5.288,0.552,8,0.552h336
					c2.712,0,5.376-0.224,8-0.552V368C408,302.184,358.304,248.024,294.4,240.864z"/>
				<g>
				</svg>
			</div>
			<div class="comments" v-if="sticker.cls === 'comments-sticker'">
				<hr>
				<h3>Comments:</h3>
				<div class="first-comment">{{ sticker.firstComment }}</div>
				<div class="other-comments">+{{ sticker.comments.length }}</div>
			</div>
		</div>


		<svg width="62" height="67" viewBox="0 0 62 67" class="circle-sticker" style="cursor: auto;" v-for="circleStick in circleStickers" :style="circleStick"><g filter="url(#filter0_f)"><path d="M31 62C45.3594 62 57 50.3594 57 36L31 10C16.6406 10 5 21.6406 5 36C5 50.3594 16.6406 62 31 62Z" fill="black" fill-opacity="0.1"/></g><path d="M31 60C47.5685 60 61 46.5685 61 30L31 0C14.4315 0 1 13.4315 1 30C1 46.5685 14.4315 60 31 60Z"/><path d="M61 30C44.4315 30 31 16.5685 31 0L61 30Z" fill="black" fill-opacity="0.15"/><defs><filter id="filter0_f" x="0" y="5" width="62" height="62" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/><feGaussianBlur stdDeviation="2.5" result="effect1_foregroundBlur"/></filter></defs></svg>

	</div>
	<script type="text/javascript">
		function getRandInt(min, max) {
			return Math.floor(Math.random() * (max - min + 1)) + min;
		}


		function getRandColor() {
			let colors =  [["#FFF6C8", "#84793F"], ["#E0FFC8", "#5D843F"], ["#C8FFF2", "#3E8473"],
				["#C8F2FF", "#3F7485"], ["#C8DBFF", "#3F5785"], ["#E0C8FF", "#5C3D84"],
				["#FFC8C8", "#853D3D"], ["#FFE6C8", "#86543F"]][getRandInt(0, 7)];

			return {background: colors[0], color: colors[1]}
		}

		let app = new Vue({
			el: "#app",
			data: {
				stickers: [
					{
						content: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor consectetur nihil possimus molestiae dicta deserunt laboriosam officia aliquid, eligendi assumenda officiis sit dolore natus, voluptas beatae quis alias dignissimos ipsa?",
						cls: "small-sticker",
						st: Object.assign(getRandColor(), {left: "60%", top: "0%", transform: "rotate("+ getRandInt(-1, 1) +"deg)" }),
					},
					{
						content: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor consectetur nihil possimus molestiae dicta deserunt laboriosam officia aliquid, eligendi assumenda officiis sit dolore natus, voluptas beatae quis alias dignissimos ipsa?",
						cls: "small-sticker",
						st: Object.assign(getRandColor(), {left: "85%", top: "-20%", transform: "rotate("+ getRandInt(-1, 1) +"deg)" }),
					},
					{
						content: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor consectetur nihil possimus molestiae dicta deserunt laboriosam officia aliquid, eligendi assumenda officiis sit dolore natus, voluptas beatae quis alias dignissimos ipsa?",
						cls: "small-sticker",
						st: Object.assign(getRandColor(), {left: "90%", top: "18%", transform: "rotate("+ getRandInt(-1, 1) +"deg)" }),
					},
					{
						content: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor consectetur nihil possimus molestiae dicta deserunt laboriosam officia aliquid, eligendi assumenda officiis sit dolore natus, voluptas beatae quis alias dignissimos ipsa?",
						cls: "comments-sticker",
						st: Object.assign(getRandColor(), {left: "80%", top: "40%", transform: "rotate("+ getRandInt(-1, 1) +"deg)" }),
						firstComment: "This is a comment left on this sticky for additional thoughts or feedback",
						comments: ["a", "b"]
					},
					{
						content: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor consectetur nihil possimus molestiae dicta deserunt laboriosam officia aliquid, eligendi assumenda officiis sit dolore natus, voluptas beatae quis alias dignissimos ipsa?",
						cls: "small-sticker",
						st: Object.assign(getRandColor(), {left: "47%", top: "80%", transform: "rotate("+ getRandInt(-1, 1) +"deg)" }),
					},
					{
						content: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor consectetur nihil possimus molestiae dicta deserunt laboriosam officia aliquid, eligendi assumenda officiis sit dolore natus, voluptas beatae quis alias dignissimos ipsa?",
						cls: "small-sticker",
						st: Object.assign(getRandColor(), {left: "58%", top: "45%", transform: "rotate("+ getRandInt(-1, 1) +"deg)" }),
					},
				],
				circleStickers: [
					{left: "85%", top: "20%", fill: getRandColor().background},
					{left: "70%", top: "35%", fill: getRandColor().background},
					{left: "70%", top: "90%", fill: getRandColor().background}
				]
			}
		})
	</script>
</body>
</html>