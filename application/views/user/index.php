    <html>
	<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CODIST</title>

    <link rel="icon" type="image/png" href="<?= base_url('assets/user/')?>img/favicon.png">
	<script src="<?= base_url(); ?>assets/admin/plugins/jquery/jquery.min.js"></script>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<style>
		@import url('https://fonts.googleapis.com/css?family=Nunito&display=swap');
		@import url('https://fonts.googleapis.com/css?family=Varela+Round&display=swap');
		@import url('https://fonts.googleapis.com/css?family=Amaranth&display=swap');
		@import url('https://fonts.googleapis.com/css?family=Montserrat&display=swap');
		@import url('https://fonts.googleapis.com/css?family=Righteous&display=swap');
		@import url('https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap');

			html{
				scroll-behavior:smooth;
			}
					
			body{
				padding:0px;
				margin:0px;

			}
            
			.navbar{
				background-color:#333;				
				margin:0px;
				padding:20px;
				width:device-width;
				position:fixed;
				width:98%;
				font-family: 'Nunito', sans-serif;
				z-index:1;
			}


			.navbar a{
				position:relative;
				padding:20px;
				color:white;
				text-decoration:none;
				font-size:16px;
				text-align:center;
				padding-left:30px;
				padding-right:30px;
				letter-spacing: 0.15em;
				
				
			}
			

			.navbar a:after{
				background: none repeat scroll 0 0 transparent;
  				bottom: 0;
  				content: "";
  				display: block;
  				height: 2px;
  				left: 50%;
  				position: absolute;
  				background: #fff;
  				transition: width 0.3s ease 0s, left 0.3s ease 0s;
  				width: 0;
				}

			
			.navbar a:hover:after { 
  					width: 100%; 
  					left: 0; 
				}

			
			
			
		     .parallax{
  				background-image: url("<?= base_url("assets/user/img/gol.jpg");?>");
 			    min-height: 500px; 
  				background-position: center;
  				
				
				background:linear-gradient( rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6) ),url("<?= base_url("assets/user/img/gol.jpg")?>");
				background-repeat: no-repeat;
				background-size: cover;



			}
			
	
			.text{

				color:blue;
				text-align:center;
				padding:250px;
				font-size:60px;
				font-family: 'Righteous', cursive;
				color:ecfcff;
				font-weight:bold;
			}

			.button{

				width:170px;
				height:40px;
				font-family:'Nunito', sans-serif;
				color:black;
				background-color:27aa80;
				font-weight:bold;
				border-radius:30px;
				border:none;
				transition: all 0.5s;
  				cursor: pointer;
				font-size:18px;


				}


			.button span {
 				 cursor: pointer;
 				 display: inline-block;
 				 position: relative;
 				 transition: 0.5s;
					}


			.button span:after {
  				content: '\00bb';
 				position: absolute;
  				opacity: 0;
  				top: 0;
  				right: -20px;
  				transition: 0.5s;
					}


			.button:hover span {
  				padding-right: 25px;
				}

			.button:hover span:after {
  				opacity: 1;
  				right: 0;
				}


			.divCo{
				height:700px;
				text-align:center;
				margin-top:0px;
				background-color:f1f0d1;
				
				

				}

			.divCoTex{
		
				font-family:Montserrat;
				margin-top:0px;
				padding-top:20px;
				
				font-size:50px;
				font-weight:bold;
				height:100px;

			}

			.navbut {
				margin-top:0px;
				width:80px;
				height:30px;
				padding:0px;
				background-color:transparent;
				color:white;
				border-radius:1px;
				font-weight:bold;
				display: inline-block;
				font-family:Montserrat;
				border:1px solid white;
			}
			
			.navbut:hover{
				background-color:white;
				color:black;
				border:	1px solid black;
			}


			.card {
  				box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  				transition: 0.3s;
				margin-top:60px;
				margin-left:100px;
  				width: 300px;
				height:300px;
  				border-radius: 20px;
				background-color:white;
				
				}

			.card:hover {
  				box-shadow: 0 16px 32px 0 rgba(0,0,0,0.2);
				
			}

			.card .img1 {
				background-image:url("<?= base_url("assets/user/img/ht.jpg")?>");
				background-size:cover;
				height:180px;
				width:300px;
  				border-radius: 5px 5px 0 0;
			
				
			}
			.card .img1:hover{

				background:linear-gradient( rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6) ),url("<?= base_url("assets/user/img/ht.jpg")?>");
				background-size:cover;
				height:180px;
				width:300px;

			}

			.card .img2 {
				background-image:url("<?= base_url("assets/user/img/css.jpg")?>");
				background-size:cover;
				height:180px;
				width:300px;
  				border-radius: 5px 5px 0 0;
			
				
			}
			.card .img2:hover{

				background:linear-gradient( rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6) ),url("<?= base_url("assets/user/img/css.jpg")?>");
				background-size:cover;
				height:180px;
				width:300px;

			}.card .img3 {
				background-image:url("<?= base_url("assets/user/img/javascript.jpg")?>");
				background-size:cover;
				height:180px;
				width:300px;
  				border-radius: 5px 5px 0 0;
			
				
			}
			.card .img3:hover{

				background:linear-gradient( rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6) ),url("<?= base_url("assets/user/img/javascript.jpg")?>");
				background-size:cover;
				height:180px;
				width:300px;

			}

			.container {
  				padding: 2px 16px;
				background-color:white;
				font-size:20px;
				
			}



            .divFac{
				
				height:900px;
				text-align:center;
				margin-top:0px;
				

	
			}


			.divFacTex{
				font-family:Montserrat;
				margin-top:0px;
				padding-top:20px;
				font-size:50px;
				font-weight:bold;

			}


			hr{

				border-bottom:4px solid black;
				width:700px;
				border-radius:20px; 

			}


			.divFac1{

				
				width:300px;
				height:300px;
				margin-left:5%;
				margin-top:6%;
				display:inline-block;						

			}


			.divQ{
				
				height:450px;
				margin-top:0px;

	
			}



			.img{
				margin-top:80px;
				margin-left:60px;
				display:inline-block;
				
			}

			.divQ1{
				margin-top:0px;
				margin-left:150px;
				display:inline-block;
			}

			blockquote{

				font-family:"Josefin Sans";
				font-size:30px;
			
			}
			blockquote::before{
					content:"\201C";
					font-size:120px;
					color:ed1250;
			}

			blockquote::after{
					content:"\201D";
					font-size:120px;
					color:ed1250;
			}

			.divD{
				height:200px;
				text-align:center;
				margin:0px;
				padding:10px;
				font-family:Montserrat;
				font-size:30px;
				background-color:d4d7dd;
			}


			.slog{
				height:40px;
				text-align:center;
				margin:0px;
				padding:10px;
				font-family:Montserrat;
				font-size:30px;
				background-color:61234e;
				color:white;
			}
			
			table{
				margin-left:40px;

			}
            
            button:focus{
                outline: none;
            }

			.footer{
				height:300px;
				text-align:center;
				margin:0px;
				padding:10px;
				padding-top:75px;
				font-family:Montserrat;
				font-size:15px;
				background-color:#032535;
				line-spacing: 5px;
				
			}    
            
            footer table{
                padding: 0px;
                width: 80%;
                text-align: left;
                margin-left: 2%;
                border: none;
                margin-bottom: 5%;
            }
            
            footer td{
                width: 69%;
                
            }
            
            footer td:first-child{
                border-right: 2px solid white;
                width: 60%;
            }
            
            footer table td p{
                font-size: 20px;
                font-weight: bold;
                color: white;
            }
            
			.footer a{
				text-decoration:none;
				color:#d4d7dd;	
			}
			.footer a:hover{
				color:#f6f6f6;
			}

			.footer hr{
				
				border-bottom:1px white;
				width:100%;
                margin-bottom: 8px;
				
			}
            
            .foot .left , .foot .right{
                display: inline-block;
                
            }
            
            .foot .left{
                margin-left: 0px;
                margin-right: 83%;
                height: 10px;
                padding: 0px;
                font-size:12px;

                
            }
            
            .foot{
                width: 100%;
                text-align: left;
                color: white;
                 padding: 0px;
                
            }
            
            
        
            
.spinner-wrapper {
position: fixed;
height: 100%;
width: 100%;
left: 0;
top: 0;
right: 0;
bottom: 0;
background-color: #ff6347;
z-index: 999999;
}
			
            
.sk-folding-cube {
  margin: 320px auto;
  width: 40px;
  height: 40px;
  position: relative;
  -webkit-transform: rotateZ(45deg);
          transform: rotateZ(45deg);
}

.sk-folding-cube .sk-cube {
  float: left;
  width: 50%;
  height: 50%;
  position: relative;
  -webkit-transform: scale(1.1);
      -ms-transform: scale(1.1);
          transform: scale(1.1); 
}
.sk-folding-cube .sk-cube:before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: #333;
  -webkit-animation: sk-foldCubeAngle 2.4s infinite linear both;
          animation: sk-foldCubeAngle 2.4s infinite linear both;
  -webkit-transform-origin: 100% 100%;
      -ms-transform-origin: 100% 100%;
          transform-origin: 100% 100%;
}
.sk-folding-cube .sk-cube2 {
  -webkit-transform: scale(1.1) rotateZ(90deg);
          transform: scale(1.1) rotateZ(90deg);
}
.sk-folding-cube .sk-cube3 {
  -webkit-transform: scale(1.1) rotateZ(180deg);
          transform: scale(1.1) rotateZ(180deg);
}
.sk-folding-cube .sk-cube4 {
  -webkit-transform: scale(1.1) rotateZ(270deg);
          transform: scale(1.1) rotateZ(270deg);
}
.sk-folding-cube .sk-cube2:before {
  -webkit-animation-delay: 0.3s;
          animation-delay: 0.3s;
}
.sk-folding-cube .sk-cube3:before {
  -webkit-animation-delay: 0.6s;
          animation-delay: 0.6s; 
}
.sk-folding-cube .sk-cube4:before {
  -webkit-animation-delay: 0.9s;
          animation-delay: 0.9s;
}
@-webkit-keyframes sk-foldCubeAngle {
  0%, 10% {
    -webkit-transform: perspective(140px) rotateX(-180deg);
            transform: perspective(140px) rotateX(-180deg);
    opacity: 0; 
  } 25%, 75% {
    -webkit-transform: perspective(140px) rotateX(0deg);
            transform: perspective(140px) rotateX(0deg);
    opacity: 1; 
  } 90%, 100% {
    -webkit-transform: perspective(140px) rotateY(180deg);
            transform: perspective(140px) rotateY(180deg);
    opacity: 0; 
  } 
}

@keyframes sk-foldCubeAngle {
  0%, 10% {
    -webkit-transform: perspective(140px) rotateX(-180deg);
            transform: perspective(140px) rotateX(-180deg);
    opacity: 0; 
  } 25%, 75% {
    -webkit-transform: perspective(140px) rotateX(0deg);
            transform: perspective(140px) rotateX(0deg);
    opacity: 1; 
  } 90%, 100% {
    -webkit-transform: perspective(140px) rotateY(180deg);
            transform: perspective(140px) rotateY(180deg);
    opacity: 0; 
  }
}

			
			
			@media (max-width:500px) {

				
				.text{

				color:blue;
				text-align:left;
				padding-left:30px;
				font-size:40px;
				font-family: 'Righteous', cursive;
				color:ecfcff;
				font-weight:bold;
			}

				.navbar a{
				position:relative;
				padding:20px;
				color:white;
				text-decoration:none;
				font-size:14px;
				text-align:center;
				padding-left:10px;
				padding-right:10px;
				letter-spacing: 0.15em;
				
				
			}
			.divCo{
				height:1400px;
				text-align:center;
			}
				
			table td{
				display:block;
			}
			.card{
				margin-left:6%;
			}


				hr{

				width:70%;	
				}

				

				.divFac{
				
				height:1400px;
				
					
			        }

				.divFac1 img{

					display:none;
				}

				.divFac1 p::after{

					content:"<br></br>";
				}

				#divFac1{

					
					margin-left:-65px;

				}
				.divQ img{

					display:none;
					
				}
				
				.divQ{

					height:700px;

				}

				blockquote {

					margin-left:-50px;

				}
				table{
					margin-left:10px;

				}

				.divD{

					height:240px;
				}

				.footer hr{

					width:70%;
				}
                
                footer table td:first-child{
                    display: none;
                }
                
                footer table td{
                    text-align: center;
                    margin-left:6px;
                }
                
                .foot{
                    display: inline;
                }
                
                .foot .left{
                    display: none;
                }
                
			}

			

		</style>

	

	</head>
            
	<body>
		<div class="navbar">
			
			<a href="#home">Home</a>
			<a href="#course">Courses</a>
			<a href="#footer">Join us</a>
			<button class="navbut" onclick=window.location.href='<?= base_url("login"); ?>'>log in</button>
		</div>

		<div class="parallax">
			<div class="text" id="home">
				BE A CREATIVE CODER WITH CODIST<br>
				<button class="button" align="right" onclick=window.location.href='<?= base_url("login"); ?>'><span>Get Started</span></button>
			</div>
		</div>

			
			<div class="divCo" id="course">
				<p class="divCoTex" align="center">Courses we provide</p><hr>
			<table>
			
			    <tr>
				<td>
				<div class="card">
  				<div class="img1"></div>
  					<div class="container">
    						<h4 style="font-family:Montserrat;"><b>HTML5</b></h4> 
    						<p style="font-family:Montserrat;">Tutorial</p> 
  					</div>
				</div>
			    	</td>

				<td>
				<div class="card">
  				<div class="img2"></div>
  					<div class="container">
    						<h4 style="font-family:Montserrat;"><b>CSS</b></h4> 
    						<p style="font-family:Montserrat;">Tutorial</p> 
  					</div>
                    </div>
				</td>
                    
				<td>
				<div class="card">
  				<div class="img3"></div>
  					<div class="container">
    						<h4 style="font-family:Montserrat;"><b>JavaScript</b></h4> 
    						<p style="font-family:Montserrat;">Tutorial</p> 
  					</div>
				</div>
				</td>
			</tr>

			</table>

				<br><br><br>
							
			</div>
			<div class="divFac">

				<p class="divCoTex" align="center">Why To learn From Here ?</p><hr>
				<div class="divFac1" style="margin-left:7px;">

					<img src="<?= base_url("assets/user/img/images.png")?>" width="300px" height="300px">
					<br><p style="font-family:Montserrat;margin-top:0px;padding-top:20px;font-size:30px;font-weight:bold;padding-top:0px;">Trusted Content</p>
					<p style="font-family:Montserrat;font-size:15px;">Created by experts, <b>codist's</b> library of trusted, standards-aligned practice and lessons and more. It is all free for learners and teachers.</p>
				</div>

				<div class="divFac1" id="divFac1"  style="margin-right:25px;">

					<img src="<?= base_url("assets/user/img/for.jpg")?>" width="370px" height="300px">
					<br><p style="font-family:Montserrat;margin-top:0px;padding-top:20px;font-size:30px;font-weight:bold;margin-left:90px;">Forum</p>
					<p style="font-family:Montserrat;font-size:15px;margin-left:85px;">Keep learning through forum.<br>chit-chat your doubts.<br>meet experts.</p>

				</div>
				<div class="divFac1" id="divFac1">

					<img src="<?= base_url("assets/user/img/per.png")?>" width="350px" height="220px" style="margin-left:15px;">
					<br><p style="font-family:Montserrat;margin-top:0px;padding-top:20px;font-size:30px;font-weight:bold;margin-left:75px;">personalized</p>
					<p style="font-family:Montserrat;font-size:15px;"><p style="font-family:Montserrat;font-size:15px;margin-left:75px;">Students practice at their own pace, first filling in gaps in their understanding and then accelerating their learning.</p>
				</div><br><br><br><br><br><br><br>

				<button class="button" align="right" style="background-color:537d91;" onclick=window.location.href="<?= base_url("register") ?>"><span>Sign Up Now!</span></button>
				

			</div>


			<div class="divQ">

			     <div class="img">
				<img src="<?= base_url("assets/user/img/mark.png") ?>" height="300px" width="370px">

			     </div>

			     <div class="divQ1">
				<blockquote>My number one piece of advice is:<p>you should learn how to program</p></blockquote>
			     </div>


			</div>
			<div class="divD">
			<p><b>Become a member of our growing community!</b></p>
			<button class="button" style="background-color:ac8daf;width:280px;" onclick=window.location.href="<?= base_url("register") ?>"><span>Start Learning Now</span></button>
			</div>

			<div class="slog">
				<b>Be Creative.</b>
			</div>
			<footer id ="footer" class="footer">
                
            <table>
                <tr>
                    <td>
                    
                            <p>Our mission is to provide a free,<br> world-class education to anyone, anywhere.<br>

                                Codist is a nonprofit organization.</p>
                    
                    </td>
                    <td style="padding-left: 20%;padding-top: 28px;">
				            <a href="#home"><b>Home</b></a><br><br>
				            <a href="#course"><b>Courses</b></a><br><br>
				            <a href="#footer"><b>Join Us</b></a><br><br><br><br>
                    </td>

                </tr>
            </table>
                
                <div class="foot">
                    <div class="left">
                        <p>2019 codist</p>
                        
                    </div>
                    <div class="right">
                        
                        <a href="https://www.facebook.com/profile.php?id=100011764476007"><i class="fa fa-facebook-square" style="font-size: 30px;"></i></a>&nbsp;
                        <a href="https://www.instagram.com/sarcasti_c__boy/?hl=en"><i class="fa fa-instagram" style="font-size: 30px;"></i></a>&nbsp;
                        <a href="https://twitter.com/sarcasti_c__boy"><i class="fa fa-twitter-square" style="font-size: 30px;"></i></a> 
                        
                    </div>
                </div>
            </footer>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

			<script>
        jQuery(window).load(function(){
            jQuery(".spinner-wrapper").fadeOut(6000);
        });
    </script>
	</body>
	<div class="spinner-wrapper">
    <div class="sk-folding-cube">
  <div class="sk-cube1 sk-cube"></div>
  <div class="sk-cube2 sk-cube"></div>
  <div class="sk-cube4 sk-cube"></div>
  <div class="sk-cube3 sk-cube"></div>
        </div> 
</div>
</html>
