<?php include "common/application_top.php"; ?>

	<!-- Breadcrumb and title -->
<style type="text/css">
form#slider{width:524px; margin:0 auto; clear:left;}
form#slider article{background: white; padding:30px; float:left; margin-top: 20px; width:100%;}
form#slider label{width:144px; float:left; margin-right: 20px; color:#474747;}
form#slider input{float:left; width:300px; font-size:13px;border:none; background:#ececec; padding:7px 13px; border-radius: 4px; -moz-border-radius: 4px; -webkit-border-radius: 4px;}
form#slider select{float:left; width:300px;}
form#slider textarea{float:left; width:300px; height: 150px; border:none; background:#ececec; padding:7px 13px; border-radius: 4px; -moz-border-radius: 4px; -webkit-border-radius: 4px;}
.form-item{margin-bottom: 10px; float:left;}
input.form-submit{background:#f36b06!important; color:white; float:right!important;}
a.next{background:#da0040; display:block; width:300px; float:left; margin: 10px 0 0 164px; text-align:center;  clear:left; padding:7px 13px; border-radius: 4px; -moz-border-radius: 4px; -webkit-border-radius: 4px; color:white; text-decoration: none}
#page{float:left; margin: 10px 0 0 0}
#page li{float:left; margin:0 5px 0 0; padding:5px 15px;  background:#ccc;  text-align:center;  border-radius: 4px; -moz-border-radius: 4px; -webkit-border-radius: 4px; color:white; }
#page li.active{ background:#f36b06;  }
#page li a{ color:white; text-decoration: none}
</style>


    <section id="bc-t">
        <div class="container">
            <style>
                .label_width{
                    width: 120px;
                }
            </style>

        </div>
    </section>
    <!-- Content Section. If need sidebars use the tag: <aside>. If articles use tag: <article> -->
    <section id="club">
        <div class="container">
                    <br/>
            <div class="tab">Post Journey</div>
            <!-- POST -->
      
                <div class="club-content">
				    <?php 
                        if($this->session->userdata('user_id') != null){
                            if($this->session->flashdata('login') != null){
                                echo '<div class="message_error">';
                                echo $this->session->flashdata('login');
                                echo '</div>';
                            }
                            if($this->session->flashdata('msg') != null){
                                echo '<div class="message_success">';
                                echo $this->session->flashdata('msg');
                                echo '</div>';
                            }?>
                            <div class="img-wrap col-3">
                            </div>

                        
                          <form method="post" action="home/dataProcess" id="slider" class="form-signin" role="form">

            <article id="page1">

                <div class="form-item">
                                        <select class="form-control" name="fixtures" id="fixture" required >
                            <option value="" disabled selected>Select a fixture</option>
                            <?php
                         $userTeamId = '1';

                                $getYourTeamAway = $this->db->get_where('fixtures', array('awayteam_id' => $userTeamId));
                                foreach ($getYourTeamAway->result() as $row) {
                                $fDate = $row->date;
                                    $awayTeamName = $this->db->get_where('teams', array('id' => $row->awayteam_id));
                                    foreach ($awayTeamName->result() as $row2) {
                                        $Aname = $row2->name;
                                        $ApostCode = $row2->postcode;
                                    }
                                    $homeTeamName = $this->db->get_where('teams', array('id' => $row->hometeam_id));
                                    foreach ($homeTeamName->result() as $row3) {
                                        $Hname = $row3->name;
                                        $HpostCode = $row3->postcode;
                                    }
                                    echo '<option data-home="'.$HpostCode.'" data-away="'.$ApostCode.'" data-date="'.$fDate.'" value="'.$row->id.'">'.$Hname." vs ".$Aname.'</option>';
                                }
                            ?> 
                            </select>


                            <?php 
                                if(!empty($fixture_detail)){
                                    foreach($fixture_detail as $rows){
                                        echo '<input type="hidden" id="selval" value="'.$rows->Home.' '.$rows->Away.'"/>';
                                    }
                                }
                            ?>
                           </div>
                             <div class="form-item">
                            <label class="label_width hiding">Date:</label><input disabled readonly type="text" name="fixtureDate" placeholder="Date of Fixture" class="form-control hiding" id="fixtureDate" required/></div>
                           <div class="form-item">
                            <label class="label_width hiding">Leaving from:</label><input type="text" name="leavingFrom" placeholder="Post Code" class="form-control hiding" id="leavingFrom" required/><label class="left_label hiding"><img src="<?php echo base_url(); ?>images/marker.png" /></label></div>
                            <div class="form-item"><label class="label_width hiding">Arriving at:</label><input type="text" name="leavingTo" class="form-control hiding" placeholder="Post Code" id="leavingTo" required/><label class="left_label hiding"><img src="<?php echo base_url(); ?>images/marker.png" /></label><br/>
                </div>
                </article>
<article id="page2">
                <div class="form-item">
                <label for="formatCheckBox" style="width:300px">Will your journey be a return journey?</label><br /><br /><input id="formatCheckBox" checked="checked" type="checkbox" name="return" />

                </div>

            
            </article>
            <article id="page3">
            
               <div class="form-item">
               <p>It is important to know how much petrol each person should contribute, use our handy calculator to work it out</p>
                              </div>
                <div class="form-item">
                    <label class="label_width">Petrol price per litre:</label><input type="number" value="130" name="petrolPrice" class="form-control" placeholder="Petrol price" required>

                <div class="form-item">
				<label class="label_width">MPG:</label><input type="number" name="MPG" placeholder="MPG" value="35" class="form-control" number/>

                </div>

                <div class="form-item">
                     <label  class="label_width">Number of spaces offered</label><input type="number" name="numberPeople" class="form-control date" placeholder="Number of people" required>
  
                </div>

          

                
            </article>
            <article id="page4">
     
                <div class="form-item">
            
                   <label  class="label_width">Estimated Leave time:</label>   <input class="datePick" id="leaveTime" type="text" name="leaveTime" class="form-control date" placeholder="Leave time" required><label class="left_label"><img src="<?php echo base_url(); ?>images/clock.png" /></label><br/>
                    </div>
                    <div class="form-item"> 
                           <label  class="label_width marginBottomForm">Estimated Arrive time:</label><input class="datePick" type="text" id="arriveTime" name="arriveTime" class="form-control date" placeholder="Arrive time" required><label class="left_label"><img src="<?php echo base_url(); ?>images/clock.png" /></label><br/>
                            
                </div>
</article>
<article id="page5">
<div class="form-item">
<p>In this section please include further detail. For example, whether you are willing to stop en-route.</p>
</div>
<div class="form-item">
 <label>Description:</label><textarea name="description"></textarea>
</div>
                
<button class="btn btn-lg btn-primary btn-block" name="submit" type="submit" id="calculateButton">Calculate<button>
            </article>
            </form>
                    </div>
                <br/>
         </div>
		<?php } 
        else {		
		  echo '<p>You must be logged in to view this page</p>';
        } 
        ?>
        </div>
   
        </div>
    </section>

 
    

<script>

    $(document).ready(function(){

    //$(".datePick").timepicker();   
    

     // add next button to all screens but last
        $("article:not(:last)").append('<a class="next" href="#">Next</a>');
        //hide every form section except first
        $("article:nth-child(1n+2)").hide();
        //add class of visible to first screen
        $("article:first").addClass("visible");
        //add an empty unordered list to be populated below
        $("#slider").append("<ul id='page'></ul>");
       
        //start the index at 1 
        var pageNum = 1;
        //go through each article and add a list item for each article with the current page number
        $("article").each(function(){

            //increment page number by 1
            pageNum++;
        });

        //first page is already active, so we start with 2
        var curPage = 2;

        //every time the next button is clicked, remove the current panels class of visible and apply it to the next and fade it in.
        $("a.next").on("click", function(e){
        var con  = 1;
        $("#page" + (curPage-1) + " :input").each(function() {
        
        if($(this).val() == "") {
        
        con = 0;
        
        }
        
        });
        

        if ( con == 0 ) {
        alert("All fields must be filled in");
        }
        else {
        
                   e.preventDefault();
            $(this).closest("article").removeClass("visible").hide().next().addClass("visible").fadeIn();
            
            //remove active state of pagination
            $("#page li").removeClass("active");

            //add an active state to the list item with an nth child equal to that of the page index.
            $("#page li:nth-child(" + curPage+ ")").addClass("active");

            curPage++;
            
            }
        });
        
        
        var input = $('.datePick');
input.clockpicker({
    autoclose: true
});

// Manual operations
$('#button-a').click(function(e){
    // Have to stop propagation here
    e.stopPropagation();
    input.clockpicker('show')
            .clockpicker('toggleView', 'minutes');
});
$('#button-b').click(function(e){
    // Have to stop propagation here
    e.stopPropagation();
    input.clockpicker('show')
            .clockpicker('toggleView', 'hours');
});
 



});
</script>
<?php include "common/application_bottom.php";?>

