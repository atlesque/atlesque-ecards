<?php
$from = esc_html__( 'From', 'odude-ecard' );
$output="";
$abc="";


ob_start ();



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

		
	<h2>
	<?php echo $ecardview->SN; ?> Has Sent You an E-Card
	</h2><?php echo $ecardview->SE; ?>	<hr>
		<div class="pure-g">
			<div class="pure-u-1-2" style="text-align:center;"><img src="<?php echo $image_medium; ?>"></div>
		</div>
		
		<?php
		do_action('odudecard_music',$post);
		?>

<script type="text/javascript">
 jQuery(function() 
   {
    //alert( "ready!" );
	jQuery('#odude').trigger('click'); 
});
</script>

	
		
		
		<?php
		if(isset($_GET['pick']))
		{
			?>
		<hr><a href='<?php echo get_permalink( $post,false); ?>' class='pure-button pure-button-primary'><?php echo esc_html__( 'Send this Ecard to others', 'odude-ecard' ); ?></a>
<?php
		}

$output=ob_get_clean (); 
?>