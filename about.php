<?php
    include "conn.php"; 
    if(isseller()){
        header('Location: ./inventory.php'); 
    }elseif(iscustomer()){  
        header('Location: ./products.php');
    }  
?>
<html>
    <head>
        <?php
            include "all.php";
        ?>
    </head>
    <body>
        <?php
            include "nav.php";
        ?>
        <div class="container">
        	<div class="row">
        		<div class="col-lg-4">
        			<div class="container-fluid">
        				<div class="row">
        					<div class="panel panel-default">
        						<div class="panel-heading"><h1> Our Company</h1></div>
        						<div class="panel-body"><h4>
		        					Lapshop's vision is to create India's most reliable and frictionless commerce ecosystem that creates life-changing experiences for buyers and sellers.<br><br>
		        					In February 2010, Jack along with John, started Lapshop.com - India's largest online marketplace, with the widest assortment of 60 million plus products across 800 categories from regional, national and international brands and retailers.<br><br>

									With millions of users and more than 300,000 sellers, Lapshop is the shopping destination for Internet users across the country, delivering to 6000+ cities and towns in India.

									In its journey till now, Lapshop has partnered with several global marquee investors and individuals such as SoftBank, BlackRock, Temasek, Foxconn, Alibaba, eBay Inc., Premji Invest, Intel Capital, Bessemer Venture Partners, Mr. Ratan Tata, among others.
								</h4></div>
        					</div>
        				</div>
        			</div>
        		</div>
        		<div class="col-lg-4">
        			<div class="container-fluid">
        				<div class="row">
        					<div class="panel panel-default">
        						<div class="panel-heading"><h1>Core Values</h1></div>
        						<div class="panel-body"><h4>
        							We have always taken pride in our culture. There are some core values that have been inherent and are an integral part of our success story. These values are a pure reflection of what is important to us as a Team and Business.<br><br>
        							<ul>
        								<li><b>BE RELENTLESS</b><br>
											We do not give up. We make it happen - no matter what it takes or how long.
										</li><br>
										<li><b>OWN OUTCOMES</b><br>
											We take complete ownership and accountability not just for the process but for results and outcomes, as well.
										</li><br>
										<li><b>ALWAYS BE CURIOUS</b><br>
											Curiosity helps us identify the needs and concerns of our customers, suppliers and employees and world overall. We make it happen by curiosity.
										</li>
        							</ul>
        						</h4></div>
        					</div>
        				</div>
        			</div>
        		</div>
        		<div class="col-lg-4">
        			<div class="container-fluid">
        				<div class="row">
        					<div class="panel panel-default">
        						<div class="panel-heading"><h1>Leadership</h1></div>
        						<div class="panel-body"><h4>
        							Our Leadership Principles aren't inspirational wall hangings. These Principles work hard, just like we do. Amazonians use them, every day, whether they're discussing ideas for new projects, deciding on the best solution for a customer's problem, or interviewing candidates.<br><br>
        							<ul>
        								<li><b>Customer Obsession</b><br>
											Leaders start with the customer and work backwards. They work vigorously to earn and keep customer trust. Although leaders pay attention to competitors, they obsess over customers.
										</li><br>
										<li><b>Ownership</b><br>
											Leaders are owners. They think long term and don't sacrifice long-term value for short-term results. They act on behalf of the entire company, beyond just their own team.
										</li>
        							</ul>
        						</h4></div>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        <?php
            include "footer.php";
        ?>  
    </body>
</html>