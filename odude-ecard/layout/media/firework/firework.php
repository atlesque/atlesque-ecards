<?php


function odudecard_product_content($post)
{
		$cardid=$post->ID;
		
	
	$captcha="";
	$options = get_option( 'odudecard_settings','' );

	$linku=esc_url( get_permalink($options['odudecard_select_pickup_field']) );
	
	require_once(dirname(__FILE__)."/../header.php");
	$abc="";
	 $home = home_url('/');
	ob_start ();
	$SN="";
	
	if(isset($_POST['SN']))
	$SN=$_POST['SN'];

	if($SN=='')
{
	
	?>

	<style>
	
	

.odude_pyro > .odude_before, .odude_pyro > .odude_after {
  position: absolute;
  width: 5px;
  height: 5px;
  border-radius: 50%;
  box-shadow: 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff;
  -moz-animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
  -webkit-animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
  -o-animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
  -ms-animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
  animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
}

.odude_pyro > .odude_after {
  -moz-animation-delay: 1.25s, 1.25s, 1.25s;
  -webkit-animation-delay: 1.25s, 1.25s, 1.25s;
  -o-animation-delay: 1.25s, 1.25s, 1.25s;
  -ms-animation-delay: 1.25s, 1.25s, 1.25s;
  animation-delay: 1.25s, 1.25s, 1.25s;
  -moz-animation-duration: 1.25s, 1.25s, 6.25s;
  -webkit-animation-duration: 1.25s, 1.25s, 6.25s;
  -o-animation-duration: 1.25s, 1.25s, 6.25s;
  -ms-animation-duration: 1.25s, 1.25s, 6.25s;
  animation-duration: 1.25s, 1.25s, 6.25s;
}

@-webkit-keyframes bang {
  to {
    box-shadow: -102px -334.66667px #ff4400, 219px -167.66667px #15ff00, -149px 28.33333px #4dff00, 105px -108.66667px #f2ff00, 26px -198.66667px #1aff00, 240px 75.33333px #00ff44, 151px -273.66667px lime, 99px -332.66667px #5500ff, -14px -215.66667px #62ff00, -227px -281.66667px #00ff44, 178px -414.66667px #00ffb3, -182px 50.33333px #ff0040, 234px -379.66667px #cc00ff, -97px 56.33333px #4800ff, 134px -362.66667px #ff00d9, 110px -16.66667px #00fffb, -91px -411.66667px #8000ff, -21px -201.66667px #4800ff, -174px -256.66667px darkorange, 51px 24.33333px #00ff99, 170px 20.33333px #8c00ff, 71px -113.66667px #00ff2b, -138px -320.66667px #00ff7b, 58px -387.66667px #ff0d00, -86px -106.66667px #ff00e1, 119px -302.66667px #bf00ff, 190px -44.66667px #6200ff, 124px 34.33333px #7300ff, 138px 30.33333px #ff002b, 248px 69.33333px #62ff00, 53px -243.66667px #0900ff, 123px -274.66667px #00ffbf, -73px -299.66667px #99ff00, 173px -209.66667px #1100ff, 119px -57.66667px #ff8800, -138px -257.66667px #00bbff, -180px -322.66667px #00ff51, -173px -357.66667px #ff009d, -96px -338.66667px #ff0037, 119px -371.66667px #0dff00, -202px 38.33333px #00a6ff, -197px -115.66667px #ff00bb, -56px -18.66667px #00a2ff, -159px -396.66667px #7300ff, 49px -400.66667px #ff00b7, 227px -3.66667px #00ffbb, 78px 24.33333px #1500ff, 49px -134.66667px #ff7700, -113px -25.66667px #1500ff, 153px 39.33333px #00eaff, -35px -99.66667px #0004ff;
  }
}
@-moz-keyframes bang {
  to {
    box-shadow: -102px -334.66667px #ff4400, 219px -167.66667px #15ff00, -149px 28.33333px #4dff00, 105px -108.66667px #f2ff00, 26px -198.66667px #1aff00, 240px 75.33333px #00ff44, 151px -273.66667px lime, 99px -332.66667px #5500ff, -14px -215.66667px #62ff00, -227px -281.66667px #00ff44, 178px -414.66667px #00ffb3, -182px 50.33333px #ff0040, 234px -379.66667px #cc00ff, -97px 56.33333px #4800ff, 134px -362.66667px #ff00d9, 110px -16.66667px #00fffb, -91px -411.66667px #8000ff, -21px -201.66667px #4800ff, -174px -256.66667px darkorange, 51px 24.33333px #00ff99, 170px 20.33333px #8c00ff, 71px -113.66667px #00ff2b, -138px -320.66667px #00ff7b, 58px -387.66667px #ff0d00, -86px -106.66667px #ff00e1, 119px -302.66667px #bf00ff, 190px -44.66667px #6200ff, 124px 34.33333px #7300ff, 138px 30.33333px #ff002b, 248px 69.33333px #62ff00, 53px -243.66667px #0900ff, 123px -274.66667px #00ffbf, -73px -299.66667px #99ff00, 173px -209.66667px #1100ff, 119px -57.66667px #ff8800, -138px -257.66667px #00bbff, -180px -322.66667px #00ff51, -173px -357.66667px #ff009d, -96px -338.66667px #ff0037, 119px -371.66667px #0dff00, -202px 38.33333px #00a6ff, -197px -115.66667px #ff00bb, -56px -18.66667px #00a2ff, -159px -396.66667px #7300ff, 49px -400.66667px #ff00b7, 227px -3.66667px #00ffbb, 78px 24.33333px #1500ff, 49px -134.66667px #ff7700, -113px -25.66667px #1500ff, 153px 39.33333px #00eaff, -35px -99.66667px #0004ff;
  }
}
@-o-keyframes bang {
  to {
    box-shadow: -102px -334.66667px #ff4400, 219px -167.66667px #15ff00, -149px 28.33333px #4dff00, 105px -108.66667px #f2ff00, 26px -198.66667px #1aff00, 240px 75.33333px #00ff44, 151px -273.66667px lime, 99px -332.66667px #5500ff, -14px -215.66667px #62ff00, -227px -281.66667px #00ff44, 178px -414.66667px #00ffb3, -182px 50.33333px #ff0040, 234px -379.66667px #cc00ff, -97px 56.33333px #4800ff, 134px -362.66667px #ff00d9, 110px -16.66667px #00fffb, -91px -411.66667px #8000ff, -21px -201.66667px #4800ff, -174px -256.66667px darkorange, 51px 24.33333px #00ff99, 170px 20.33333px #8c00ff, 71px -113.66667px #00ff2b, -138px -320.66667px #00ff7b, 58px -387.66667px #ff0d00, -86px -106.66667px #ff00e1, 119px -302.66667px #bf00ff, 190px -44.66667px #6200ff, 124px 34.33333px #7300ff, 138px 30.33333px #ff002b, 248px 69.33333px #62ff00, 53px -243.66667px #0900ff, 123px -274.66667px #00ffbf, -73px -299.66667px #99ff00, 173px -209.66667px #1100ff, 119px -57.66667px #ff8800, -138px -257.66667px #00bbff, -180px -322.66667px #00ff51, -173px -357.66667px #ff009d, -96px -338.66667px #ff0037, 119px -371.66667px #0dff00, -202px 38.33333px #00a6ff, -197px -115.66667px #ff00bb, -56px -18.66667px #00a2ff, -159px -396.66667px #7300ff, 49px -400.66667px #ff00b7, 227px -3.66667px #00ffbb, 78px 24.33333px #1500ff, 49px -134.66667px #ff7700, -113px -25.66667px #1500ff, 153px 39.33333px #00eaff, -35px -99.66667px #0004ff;
  }
}
@-ms-keyframes bang {
  to {
    box-shadow: -102px -334.66667px #ff4400, 219px -167.66667px #15ff00, -149px 28.33333px #4dff00, 105px -108.66667px #f2ff00, 26px -198.66667px #1aff00, 240px 75.33333px #00ff44, 151px -273.66667px lime, 99px -332.66667px #5500ff, -14px -215.66667px #62ff00, -227px -281.66667px #00ff44, 178px -414.66667px #00ffb3, -182px 50.33333px #ff0040, 234px -379.66667px #cc00ff, -97px 56.33333px #4800ff, 134px -362.66667px #ff00d9, 110px -16.66667px #00fffb, -91px -411.66667px #8000ff, -21px -201.66667px #4800ff, -174px -256.66667px darkorange, 51px 24.33333px #00ff99, 170px 20.33333px #8c00ff, 71px -113.66667px #00ff2b, -138px -320.66667px #00ff7b, 58px -387.66667px #ff0d00, -86px -106.66667px #ff00e1, 119px -302.66667px #bf00ff, 190px -44.66667px #6200ff, 124px 34.33333px #7300ff, 138px 30.33333px #ff002b, 248px 69.33333px #62ff00, 53px -243.66667px #0900ff, 123px -274.66667px #00ffbf, -73px -299.66667px #99ff00, 173px -209.66667px #1100ff, 119px -57.66667px #ff8800, -138px -257.66667px #00bbff, -180px -322.66667px #00ff51, -173px -357.66667px #ff009d, -96px -338.66667px #ff0037, 119px -371.66667px #0dff00, -202px 38.33333px #00a6ff, -197px -115.66667px #ff00bb, -56px -18.66667px #00a2ff, -159px -396.66667px #7300ff, 49px -400.66667px #ff00b7, 227px -3.66667px #00ffbb, 78px 24.33333px #1500ff, 49px -134.66667px #ff7700, -113px -25.66667px #1500ff, 153px 39.33333px #00eaff, -35px -99.66667px #0004ff;
  }
}
@keyframes bang {
  to {
    box-shadow: -102px -334.66667px #ff4400, 219px -167.66667px #15ff00, -149px 28.33333px #4dff00, 105px -108.66667px #f2ff00, 26px -198.66667px #1aff00, 240px 75.33333px #00ff44, 151px -273.66667px lime, 99px -332.66667px #5500ff, -14px -215.66667px #62ff00, -227px -281.66667px #00ff44, 178px -414.66667px #00ffb3, -182px 50.33333px #ff0040, 234px -379.66667px #cc00ff, -97px 56.33333px #4800ff, 134px -362.66667px #ff00d9, 110px -16.66667px #00fffb, -91px -411.66667px #8000ff, -21px -201.66667px #4800ff, -174px -256.66667px darkorange, 51px 24.33333px #00ff99, 170px 20.33333px #8c00ff, 71px -113.66667px #00ff2b, -138px -320.66667px #00ff7b, 58px -387.66667px #ff0d00, -86px -106.66667px #ff00e1, 119px -302.66667px #bf00ff, 190px -44.66667px #6200ff, 124px 34.33333px #7300ff, 138px 30.33333px #ff002b, 248px 69.33333px #62ff00, 53px -243.66667px #0900ff, 123px -274.66667px #00ffbf, -73px -299.66667px #99ff00, 173px -209.66667px #1100ff, 119px -57.66667px #ff8800, -138px -257.66667px #00bbff, -180px -322.66667px #00ff51, -173px -357.66667px #ff009d, -96px -338.66667px #ff0037, 119px -371.66667px #0dff00, -202px 38.33333px #00a6ff, -197px -115.66667px #ff00bb, -56px -18.66667px #00a2ff, -159px -396.66667px #7300ff, 49px -400.66667px #ff00b7, 227px -3.66667px #00ffbb, 78px 24.33333px #1500ff, 49px -134.66667px #ff7700, -113px -25.66667px #1500ff, 153px 39.33333px #00eaff, -35px -99.66667px #0004ff;
  }
}
@-webkit-keyframes gravity {
  to {
    transform: translateY(200px);
    -moz-transform: translateY(200px);
    -webkit-transform: translateY(200px);
    -o-transform: translateY(200px);
    -ms-transform: translateY(200px);
    opacity: 0;
  }
}
@-moz-keyframes gravity {
  to {
    transform: translateY(200px);
    -moz-transform: translateY(200px);
    -webkit-transform: translateY(200px);
    -o-transform: translateY(200px);
    -ms-transform: translateY(200px);
    opacity: 0;
  }
}
@-o-keyframes gravity {
  to {
    transform: translateY(200px);
    -moz-transform: translateY(200px);
    -webkit-transform: translateY(200px);
    -o-transform: translateY(200px);
    -ms-transform: translateY(200px);
    opacity: 0;
  }
}
@-ms-keyframes gravity {
  to {
    transform: translateY(200px);
    -moz-transform: translateY(200px);
    -webkit-transform: translateY(200px);
    -o-transform: translateY(200px);
    -ms-transform: translateY(200px);
    opacity: 0;
  }
}
@keyframes gravity {
  to {
    transform: translateY(200px);
    -moz-transform: translateY(200px);
    -webkit-transform: translateY(200px);
    -o-transform: translateY(200px);
    -ms-transform: translateY(200px);
    opacity: 0;
  }
}
@-webkit-keyframes position {
  0%, 19.9% {
    margin-top: 10%;
    margin-left: 40%;
  }
  20%, 39.9% {
    margin-top: 40%;
    margin-left: 30%;
  }
  40%, 59.9% {
    margin-top: 20%;
    margin-left: 70%;
  }
  60%, 79.9% {
    margin-top: 30%;
    margin-left: 20%;
  }
  80%, 99.9% {
    margin-top: 30%;
    margin-left: 80%;
  }
}
@-moz-keyframes position {
  0%, 19.9% {
    margin-top: 10%;
    margin-left: 40%;
  }
  20%, 39.9% {
    margin-top: 40%;
    margin-left: 30%;
  }
  40%, 59.9% {
    margin-top: 20%;
    margin-left: 70%;
  }
  60%, 79.9% {
    margin-top: 30%;
    margin-left: 20%;
  }
  80%, 99.9% {
    margin-top: 30%;
    margin-left: 80%;
  }
}
@-o-keyframes position {
  0%, 19.9% {
    margin-top: 10%;
    margin-left: 40%;
  }
  20%, 39.9% {
    margin-top: 40%;
    margin-left: 30%;
  }
  40%, 59.9% {
    margin-top: 20%;
    margin-left: 70%;
  }
  60%, 79.9% {
    margin-top: 30%;
    margin-left: 20%;
  }
  80%, 99.9% {
    margin-top: 30%;
    margin-left: 80%;
  }
}
@-ms-keyframes position {
  0%, 19.9% {
    margin-top: 10%;
    margin-left: 40%;
  }
  20%, 39.9% {
    margin-top: 40%;
    margin-left: 30%;
  }
  40%, 59.9% {
    margin-top: 20%;
    margin-left: 70%;
  }
  60%, 79.9% {
    margin-top: 30%;
    margin-left: 20%;
  }
  80%, 99.9% {
    margin-top: 30%;
    margin-left: 80%;
  }
}
@keyframes position {
  0%, 19.9% {
    margin-top: 10%;
    margin-left: 40%;
  }
  20%, 39.9% {
    margin-top: 40%;
    margin-left: 30%;
  }
  40%, 59.9% {
    margin-top: 20%;
    margin-left: 70%;
  }
  60%, 79.9% {
    margin-top: 30%;
    margin-left: 20%;
  }
  80%, 99.9% {
    margin-top: 30%;
    margin-left: 80%;
  }
}

#ecard-message {
  
  margin: 20px auto;
  text-align: center;
  color: red;
  font: 25px/1 'Spirax', cursive;
  text-shadow: 0 0 4px rgba(255, 255, 255, 0.5);
}

	</style>
	
	
	
	
	<style>


.modal {
  display: block;
  padding: 0 1em;
  text-align: center;
  width: 100%;
}
@media (min-width: 43.75em) {

.modal {
  padding: 1em 2em;
  text-align: center;
}
}

.modal > label {
  background: #000;
  border-radius: .2em;
  color: #FFDE16;
  cursor: pointer;
  display: inline-block;
  font-weight: bold;
  margin: 0.5em 1em;
  padding: 2.75em 2em;
  -webkit-transition: all 0.55s;
  transition: all 0.55s;
}

.modal > label:hover {
  -webkit-transform: scale(0.97);
  -ms-transform: scale(0.97);
  transform: scale(0.97);
}

.modal input {
  position: absolute;
  right: 100px;
  top: 30px;
  z-index: -10;
}

.modal__overlay {
  background: black;
  bottom: 0;
  left: 0;
  position: fixed;
  right: 0;
  text-align: center;
  top: 0;
  z-index: -800;
}

.modal__box {
  padding: 1em .75em;
  position: relative;
  margin: 1em auto;
  max-width: 90%;
  width: 90%;
}

@media (min-width: 50em) {

.modal__box { padding: 1.75em; }
}

.modal__box label {
  background: #FFDE16;
  border-radius: 50%;
  color: black;
  cursor: pointer;
  display: inline-block;
  height: 1.5em;
  line-height: 1.5em;
  position: absolute;
  right: .5em;
  top: 0.5em;
  width: 1.5em;
}

.modal__box h2 {
  color: #FFDE16;
}

.modal__box p {
  color: #FFDE16;
  text-align: left;
  
}

.modal__overlay {
  opacity: 0;
  overflow:auto;
  -webkit-transform: scale(0.5);
  -ms-transform: scale(0.5);
  transform: scale(0.5);
  -webkit-transition: all 0.75s cubic-bezier(0.19, 1, 0.22, 1);
  transition: all 0.75s cubic-bezier(0.19, 1, 0.22, 1);
}

input:checked ~ .modal__overlay {
  opacity: 1;
  -webkit-transform: scale(1);
  -ms-transform: scale(1);
  transform: scale(1);
  -webkit-transition: all 0.75s cubic-bezier(0.19, 1, 0.22, 1);
  transition: all 0.75s cubic-bezier(0.19, 1, 0.22, 1);
  z-index: 800;
}

input:focus + label {
  -webkit-transform: scale(0.97);
  -ms-transform: scale(0.97);
  transform: scale(0.97);
}
</style>
	
	
			<div class="pure-g">
			
			<div class="pure-u-1-1" style="text-align:center;"><?php echo odudecard_position1(); ?></div>
	
			
			<div class="pure-u-1-2" style="text-align:center;"><img src="<?php echo odudecard_image('full'); ?>" class='ecard-image'></div>
			
			<div class="pure-u-1-2" style="text-align:center;">
			
			
				<div class="modal">
  
  <label for="modal" id="odude" >View Your Ecard</label><br>
  <input id="modal" type="checkbox" name="modal" tabindex="1">
  <div class="modal__overlay">
  <div class="ecard-container">
    <div class="modal__box">
	 
      <label for="modal">&#10006;</label>
      <h2>Your Subject Here</h2>
      <p>
	  
	   <div class="odude_pyro">
  <div class="odude_before"></div>
  <div class="odude_odude_after"></div>
</div>
	  <div id="ecard-message"><br><br>You Message Appears Here<br><br></div>
	
	  
	  
	  </p>
	  
    </div>
	</div>
  </div>
</div>
			
		
			
			
			
			
			</div>
			
			<div class="pure-u-1-1" style="text-align:center;"><?php echo odudecard_position2(); ?></div>
	
	<div class="pure-u-1-1"><?php echo $text; ?></div>
	
		</div>


	

	
	<?php
	$editor=false;
	include(dirname(__FILE__)."/../compose.php");
	
	
}
else
{
	include(dirname(__FILE__)."/../submit.php");
}
	
	$abc=ob_get_clean (); 
	return $abc;
}