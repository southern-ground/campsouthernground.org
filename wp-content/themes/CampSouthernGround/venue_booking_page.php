<?php
/*
  Template Name: Venue Booking Page
*/
?>

<?php get_header(); ?>

<div class="page">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="page_top_wrap">
            <div class="page_top container centered">
                <?php if (get_post_meta($post->ID, "capitalize_title", true)) { ?>
                <h1 class="upcase">
                    <?php } else { ?>
                    <h1>
                        <?php } ?>
                        <?php if (get_post_meta($post->ID, "custom_title", true)) {
                            echo get_post_meta($post->ID, "custom_title", true);
                        } else {
                            the_title();
                        } ?>
                    </h1>
                    <p><?php the_content(); ?></p>
            </div>
        </div>
        <div class="page_content">
            <div class="container bookingForm">

                <form id="VenueBookingForm" class="patronForm" method="POST" action="<?=get_theme_root_uri()?>/CampSouthernGround/venue_booking_page_submit.php">

                    <?php if(isset($_GET['submit']) && $_GET['submit'] === "success"): ?>
                        <div class="thankYou">
                            <strong>Thank you!</strong>
                            <p>Your request as been submitted.</p>
                        </div>
                    <?php endif; ?>

                    <h2>Venue Rental Application</h2>

                    <section>
                        <h3>Venue</h3>
                        <ul class="formGroup checkGroup">
                            <li>
                                <input type="checkbox"
                                       id="DiningHall"
                                       name="DiningHall">
                                <label for="DiningHall" class="checkboxLabel"></label>
                                <label for="DiningHall" class="inputLabel">Dining Hall</label>
                            </li>
                            <li>
                                <input type="checkbox"
                                       id="CrabTreehouse"
                                       name="CrabTreehouse">
                                <label for="CrabTreehouse" class="checkboxLabel"></label>
                                <label for="CrabTreehouse" class="inputLabel">Space Crab Treehouse</label>
                            </li>
                            <li>
                                <input type="checkbox"
                                       id="ShadePavillion"
                                       name="ShadePavillion">
                                <label for="ShadePavillion" class="checkboxLabel"></label>
                                <label for="ShadePavillion" class="inputLabel">Shade Pavillion</label>
                            </li>
                        </ul>
                    </section>

                    <section>
                        <h3>Contact</h3>
                        <div class="formGroup">
                            <div class="formColumn-2 inputGroup">
                                <label for="FirstName">
                                    First Name
                                </label>
                                <input type="text" id="FirstName" name="First_Name"/>
                            </div>
                            <div class="formColumn-2 inputGroup">
                                <label for="LastName inputGroup">
                                    Last Name
                                </label>
                                <input type="text" id="LastName" name="Last_Name"/>
                            </div>
                            <div class="formColumn-2 inputGroup">
                                <label for="Organization">
                                    Organization
                                </label>
                                <input type="text" id="Organization" name="Organization"/>
                            </div>
                            <div class="formColumn-2 inputGroup">
                                <label for="OrganizationWebsite">
                                    Organization Website
                                </label>
                                <input type="text" id="OrganizationWebsite" name="Orangization_Website"/>
                            </div>
                        </div>
                        <div class="inputGroup">
                            <label for="Address">Address</label>
                            <input type="text" id="Address" name="Address_One"/>
                            <input type="text" name="Address_Two" class="continuation"/>
                        </div>
                        <div class="formGroup">
                            <div class="formColumn-2 inputGroup">
                                <label for="Phone">
                                    Phone
                                </label>
                                <input type="text" id="Phone" name="Phone" class="endOfGroup-one"/>
                            </div>
                            <div class="formColumn-2 inputGroup">
                                <label for="Email">
                                    Email
                                </label>
                                <input type="text" id="Email" name="Email" class="endOfGroup-two"/>
                            </div>
                        </div>
                    </section>

                    <section>
                        <h3>Event Details</h3>
                        <div class="inputGroup">
                            <label for="EventName">Event Name</label>
                            <input type="text" id="EventName" name="Event_Name"/>
                        </div>
                        <div class="formGroup">
                            <div class="formColumn-2 inputGroup">
                                <label for="EventDate">
                                    Event Date
                                </label>
                                <input type="text" id="EventDate" name="Event_Date" placeholder="MM/DD/YY"/>
                            </div>
                            <div class="formColumn-2 inputGroup">

                                <label>
                                    Is this a multi-day event?
                                </label>

                                <div class="radioPair">
                                    <div class="radioButtonContainer">
                                        <input type="radio"
                                               id="FullDayYes"
                                               name="Full_Day"
                                               value="Yes"
                                        />
                                        <label for="FullDayYes" class="radioLabel">Yes</label>
                                        <label for="FullDayYes" class="check"></label>

                                    </div>

                                    <div class="radioButtonContainer">
                                        <input type="radio"
                                               id="FullDayNo"
                                               name="Full_Day"
                                               value="No"
                                               checked
                                        />
                                        <label for="FullDayNo" class="radioLabel">No</label>
                                        <label for="FullDayNo" class="check"></label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="timeGroup">
                            <div class="inputGroup">
                                <label for="StartTime">
                                    Start Time
                                </label>
                                <input type="text" id="StartTime" name="Start_Time" class=""/>
                            </div>
                            <div class="inputGroup">
                                <label for="StartTime">
                                    End Time
                                </label>
                                <input type="text" id="EndTime" name="End_Time" class="endOfGroup-one"/>
                            </div>
                            <div class="inputGroup">
                                <label for="EstNumAttendees">
                                    Estimated Number of Attendees
                                </label>
                                <input type="text" id="EstNumAttendees" name="Est_Num_Attendees"
                                       class="endOfGroup-two"/>
                            </div>
                        </div>

                        <div class="inputGroup">
                            <label>
                                Event Description
                            </label>
                            <textarea name="Event_Description" placeholder="Event Description"
                                      class="textArea eventDescription"></textarea>
                        </div>

                    </section>

                    <section>
                        <h3>Catering</h3>
                        <label>What catering needs are you anticipating?</label>
                        <ul class="formGroup checkGroup flowLeft">
                            <li>
                                <input type="checkbox"
                                       id="Food"
                                       name="Food">
                                <label for="Food" class="checkboxLabel"></label>
                                <label for="Food" class="inputLabel">Food</label>
                            </li>
                            <li>
                                <input type="checkbox"
                                       id="Alcohol"
                                       name="Alcohol">
                                <label for="Alcohol" class="checkboxLabel"></label>
                                <label for="Alcohol" class="inputLabel">Alcohol</label>
                            </li>
                            <li>
                                <input type="checkbox"
                                       id="None"
                                       name="None"
                                       checked>
                                <label for="None" class="checkboxLabel"></label>
                                <label for="None" class="inputLabel">None</label>
                            </li>
                        </ul>

                        <div id="FoodStyle" class="disabled optionalContent">
                            <div class="subheading">If food, what style?</div>
                            <ul class="formGroup checkGroup flowLeft">
                                <li>
                                    <input type="checkbox"
                                           id="Buffet"
                                           name="Buffet">
                                    <label for="Buffet" class="checkboxLabel"></label>
                                    <label for="Buffet" class="inputLabel">Buffet</label>
                                </li>
                                <li>
                                    <input type="checkbox"
                                           id="FamilyStyle"
                                           name="Family_Style">
                                    <label for="FamilyStyle" class="checkboxLabel"></label>
                                    <label for="FamilyStyle" class="inputLabel">Family Style</label>
                                </li>
                            </ul>
                        </div>

                    </section>

                    <section>
                        <h3>A/V Needs</h3>
                        <label>Will you be bringing your own a/v equipment or utilizing our equipment?</label>
                        <ul class="formGroup checkGroup flowLeft">
                            <li>
                                <input type="checkbox"
                                       id="OwnAV"
                                       name="Own_AV">
                                <label for="OwnAV" class="checkboxLabel"></label>
                                <label for="OwnAV" class="inputLabel">Bringing Own Equipment</label>
                            </li>
                            <li>
                                <input type="checkbox"
                                       id="CampAV"
                                       name="Camp_AV">
                                <label for="CampAV" class="checkboxLabel"></label>
                                <label for="CampAV" class="inputLabel">Using Camp's Equipment</label>
                            </li>
                            <li>
                                <input type="checkbox"
                                       id="NoAV"
                                       name="No_AV"
                                       checked>
                                <label for="NoAV" class="checkboxLabel"></label>
                                <label for="NoAV" class="inputLabel">N/A</label>
                            </li>
                        </ul>
                    </section>

                    <section>
                        <h3>Team Building</h3>
                        <label>Do you want to incorporate a team building experience?</label>
                        <div class="radioPair">
                            <div class="radioButtonContainer">
                                <input type="radio"
                                       id="TeamBuildingYes"
                                       name="Team_Building"
                                       value="Yes"
                                />
                                <label for="TeamBuildingYes" class="radioLabel">Yes</label>
                                <label for="TeamBuildingYes" class="check"></label>
                            </div>

                            <div class="radioButtonContainer">
                                <input type="radio"
                                       id="TeamBuildingNo"
                                       name="Team_Building"
                                       value="No"
                                       checked
                                />
                                <label for="TeamBuildingNo" class="radioLabel">No</label>
                                <label for="TeamBuildingNo" class="check"></label>
                            </div>
                        </div>

                        <div id="TeamBuilding" class="disabled optionalContent">
                            <div class="subheading">If yes, then what kind? Note, team building experiences are priced
                                individually.
                            </div>
                            <ul class="formGroup checkGroup flowLeft">
                                <li>
                                    <input type="checkbox"
                                           id="HighLowRopesCourse"
                                           name="High_Low_Ropes_Course"
                                           class="teamBuilding">
                                    <label for="HighLowRopesCourse" class="checkboxLabel"></label>
                                    <label for="HighLowRopesCourse" class="inputLabel">High/Low Ropes Course</label>
                                </li>
                                <li>
                                    <input type="checkbox"
                                           id="Archery"
                                           name="Archery"
                                           class="teamBuilding">
                                    <label for="Archery" class="checkboxLabel"></label>
                                    <label for="Archery" class="inputLabel">Archery</label>
                                </li>
                                <li>
                                    <input type="checkbox"
                                           id="AxeThrowing"
                                           name="Axe_Throwing"
                                           class="teamBuilding">
                                    <label for="AxeThrowing" class="checkboxLabel"></label>
                                    <label for="AxeThrowing" class="inputLabel">Axe Throwing</label>
                                </li>
                                <li>
                                    <input type="checkbox"
                                           id="Facilitated"
                                           name="Facilitated"
                                           class="teamBuilding">
                                    <label for="Facilitated" class="checkboxLabel"></label>
                                    <label for="Facilitated" class="inputLabel">Facilitated team building activity
                                        with Atlanta Challenge</label>
                                </li>
                            </ul>
                        </div>

                    </section>

                    <section>
                        <h3>Rentals</h3>
                        <!--

                        Removed per Jessica's request; 8/23/17. -f.

                        <label>Do you need to rent one of our two six-seater golf carts for the event?</label>
                        <div class="radioPair clearfix">
                            <div class="radioButtonContainer">
                                <input type="radio"
                                       id="RentalOne"
                                       name="Rental"
                                       value="One Cart"
                                />
                                <label for="RentalOne"
                                       class="radioLabel">One Cart</label>
                                <label for="RentalOne" class="check"></label>
                            </div>

                            <div class="radioButtonContainer">
                                <input type="radio"
                                       id="RentalTwo"
                                       name="Rental"
                                       value="Two Carts"
                                       checked
                                />
                                <label for="RentalTwo"
                                       class="radioLabel">Two Carts</label>
                                <label for="RentalTwo" class="check"></label>
                            </div>

                            <div class="radioButtonContainer">
                                <input type="radio"
                                       id="RentalNo"
                                       name="Rental"
                                       value="No"
                                       checked
                                />
                                <label for="RentalNo"
                                       class="radioLabel">None</label>
                                <label for="RentalNo" class="check"></label>
                            </div>
                        </div>
                        -->
                        <div class="optionalContent">
                            <label>Available items:</label>
                            <ul class="formGroup checkGroup flowLeft">
                                <li>
                                    <input type="checkbox"
                                           id="RentalFields"
                                           name="Add_Rental_Fields">
                                    <label for="RentalFields" class="checkboxLabel"></label>
                                    <label for="RentalFields" class="inputLabel">Fields</label>
                                </li>
                                <li>
                                    <input type="checkbox"
                                           id="RentalCampfire"
                                           name="Add_Rental_Campfire">
                                    <label for="RentalCampfire" class="checkboxLabel"></label>
                                    <label for="RentalCampfire" class="inputLabel">Campfire</label>
                                </li>
                                <li>
                                    <input type="checkbox"
                                           id="RentalBunks"
                                           name="Add_Rental_Bunks">
                                    <label for="RentalBunks" class="checkboxLabel"></label>
                                    <label for="RentalBunks" class="inputLabel">Barracks/Bunks</label>
                                </li>
                            </ul>
                        </div>
                    </section>

                    <section>
                        <h3>&nbsp;</h3>
                        <label>Please share any addition needs, comments or questions:</label>
                        <textarea name="Additional" class="textArea"></textarea>

                        <br/>

                        <label>How did you hear about Camp Southern Ground?</label>
                        <textarea name="How_Did_You_Hear" class="textArea"></textarea>
                    </section>

                    <input type="submit" value="Submit Request" />

                    <div id="Errors">

                    </div>

                </form>
            </div>
        </div>
        <script src="<?= get_theme_file_uri() ?>/js/bookingForm.js"></script>
    <?php endwhile;
    else: ?>
        <p>Sorry, this page doesn't exist.</p>
    <?php endif; ?>
    <?php if (get_post_meta($post->ID, "show_newsletter", true)) { ?>
        <div class="page_bottom_wrap">
            <div class="container">
                <div class="col-xs-12 col-sm-6 col-sm-offset-1 align-right xs-center">
                    <h4>Sign Up For Our Newsletter</h4>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <script type="text/javascript"
                            src="https://app.e2ma.net/app2/audience/tts_signup/1374375/4b927384c4ab6ddb83789105822dce6e/1367882/?v=a%22%3E%3C/script%3E%3Cdiv"
                            id="load_check"
                            class="signup_form_message"></script>
                    <div class="e2ma_signup_form" id="e2ma_signup_form">
                        <div class="e2ma_signup_form_container row" id="e2ma_signup_form_container">
                            <form target="_new" method="post" id="e2ma_signup"
                                  onsubmit="return signupFormObj.checkForm(this)"
                                  action="https://app.e2ma.net/app2/audience/signup/1374375/1367882/?v=a">
                                <input type="hidden" name="prev_member_email" id="id_prev_member_email">
                                <input type="hidden" name="source" id="id_source">
                                <input type="hidden" name="group_799562" value="799562" id="id_group_799562">
                                <input type="hidden" name="private_set" value="{num_private}">


                                <div class="e2ma_signup_form_row">
                                    <div class="e2ma_signup_form_element"><input placeholder="Email" type="text"
                                                                                 name="email" id="id_email"></div>
                                </div>
                                <div class="e2ma_signup_form_row">
                                    <div class="e2ma_signup_form_element"><input placeholder="First Name" type="text"
                                                                                 field_id="77642"
                                                                                 name="member_field_name_first"
                                                                                 id="id_member_field_name_first"></div>
                                </div>
                                <div class="e2ma_signup_form_row">
                                    <div class="e2ma_signup_form_element"><input placeholder="Last Name" type="text"
                                                                                 field_id="78666"
                                                                                 name="member_field_name_last"
                                                                                 id="id_member_field_name_last"></div>
                                </div>
                                <div class="e2ma_signup_form_row">
                                    <div class="e2ma_signup_form_element"><input placeholder="Zip Code" type="text"
                                                                                 field_id="79690"
                                                                                 name="member_field_postal_code"
                                                                                 id="id_member_field_postal_code"></div>
                                </div>

                                <div class="e2ma_signup_form_button_row" id="e2ma_signup_form_button_row">
                                    <input id="e2ma_signup_submit_button"
                                           class="btn btn-inverse e2ma_signup_form_button" type="submit" name="Submit"
                                           value="Sign Up" {disabled}="">
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<?php get_footer(); ?>
