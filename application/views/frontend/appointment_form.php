
<?php $doctor_info = $this->db->get('doctor')->result_array(); ?>
<section class="slice slice--arrow bg-base-1">
    <div class="sct-inner container">
        <div class="section-title section-title-inverse section-title--style-1 text-center">
            <h3 class="section-title-inner">
                <span> <?php echo get_phrase('get_in_touch_with_our_professionals') ?></span>
            </h3>
            <span class="section-title-delimiter clearfix d-none"></span>
        </div>
    </div>
</section>

<section class="slice">
    <div class="container">
        <div class="row-wrapper">            
            <form method="post" action="<?php echo base_url(); ?>home/appointment/create" id="form-validate" enctype="multipart/form-data"> 
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12"
                    style="margin-top: 10px;">
                    <div class="icon-block icon-block--style-1-v2 block-icon-right block-icon-sm">
                        <div class="block-content">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('name'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="name" data-validation="required">
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-6 col-md-12 col-sm-12 col-12"
                    style="margin-top: 10px;">
                    <div class="icon-block icon-block--style-1-v2 block-icon-right block-icon-sm">
                        <div class="block-content">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('email'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="email" data-validation="email">
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-6 col-md-12 col-sm-12 col-12"
                    style="margin-top: 10px;">
                    <div class="icon-block icon-block--style-1-v2 block-icon-right block-icon-sm">
                        <div class="block-content">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('password'); ?><sup class="color-danger">*</sup></label>
                                <input type="password" class="form-control" id="name13" name="password" data-validation="required">
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-6 col-md-12 col-sm-12 col-12"
                    style="margin-top: 10px;">
                    <div class="icon-block icon-block--style-1-v2 block-icon-right block-icon-sm">
                        <div class="block-content">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('address'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="address" data-validation="required">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12"
                    style="margin-top: 10px;">
                    <div class="icon-block icon-block--style-1-v2 block-icon-right block-icon-sm">
                        <div class="block-content">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('phone'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="phone" data-validation="required">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12"
                    style="margin-top: 10px;">
                    <div class="icon-block icon-block--style-1-v2 block-icon-right block-icon-sm">
                        <div class="block-content">
                            <div class="form-group">
                                <label for="department_id"><?php echo get_phrase('sex'); ?><sup class="color-danger">*</sup></label>
                                <select name="sex" class="js-states form-control" id="js-states"  data-validation="required">
                                    <optgroup label="<?php echo get_phrase('select_sex'); ?>">   
                                <option value="male"><?php echo get_phrase('male'); ?></option>
                                <option value="female"><?php echo get_phrase('female'); ?></option>
                                    </optgroup>
                                </select>  
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12"
                    style="margin-top: 10px;">
                    <div class="icon-block icon-block--style-1-v2 block-icon-right block-icon-sm">
                        <div class="block-content">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('birth_date'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="birth_date" data-validation="required" placeholder="yyyy-mm-dd">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12"
                    style="margin-top: 10px;">
                    <div class="icon-block icon-block--style-1-v2 block-icon-right block-icon-sm">
                        <div class="block-content">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('age'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="age" data-validation="required">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12"
                    style="margin-top: 10px;">
                    <div class="icon-block icon-block--style-1-v2 block-icon-right block-icon-sm">
                        <div class="block-content">
                             <div class="form-group">
                                <label for="department_id"><?php echo get_phrase('blood_group'); ?><sup class="color-danger">*</sup></label>
                                <select name="blood_group" class="js-states form-control" id="js-states"  data-validation="required">
                               <optgroup label="<?php echo get_phrase('select_blood_group'); ?>">  
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                </optgroup>
                                </select>  
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12"
                    style="margin-top: 10px;">
                    <div class="icon-block icon-block--style-1-v2 block-icon-right block-icon-sm">
                        <div class="block-content">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('picture'); ?>(300px X 300px)</label>
                                <input type="file" class="form-control" id="name13" name="image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12"
                    style="margin-top: 10px;">
                    <div class="icon-block icon-block--style-1-v2 block-icon-right block-icon-sm">
                        <div class="block-content">
                            <div class="form-group">
                                <label for="doctor_id"><?php echo get_phrase('doctor'); ?><sup class="color-danger">*</sup></label>
                                <select name="doctor_id" class="js-states form-control" id="js-states"  data-validation="required">
                                    <optgroup label="<?php echo get_phrase('select_doctor'); ?>">   
                                         <?php foreach ($doctor_info as $row): ?>
                                        <option value="<?php echo $row['doctor_id']; ?>"><?php echo $row['doctor_id']; ?>/<?php echo $row['name']; ?></option>
                                <?php endforeach; ?>
                                    </optgroup>
                                </select>  
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12"
                    style="margin-top: 10px;">
                    <div class="icon-block icon-block--style-1-v2 block-icon-right block-icon-sm">
                        <div class="block-content">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('date'); ?><sup class="color-danger">*</sup></label>
                                <input type="date" class="form-control" id="name13" name="date_timestamp" data-validation="required">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12"
                    style="margin-top: 10px;">
                    <div class="icon-block icon-block--style-1-v2 block-icon-right block-icon-sm">
                        <div class="block-content">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('time'); ?><sup class="color-danger">*</sup></label>
                                <input type="time" class="form-control" id="name13" name="time_timestamp" data-validation="required">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12"
                    style="margin-top: 10px;">
                    <div class="icon-block icon-block--style-1-v2 block-icon-right block-icon-sm">
                        <div class="block-content">
                             <?php if(get_frontend_settings('recaptcha_status')): ?>
                                    <div class="form-group">
                                      <div class="g-recaptcha" data-sitekey="<?php echo get_frontend_settings('recaptcha_sitekey'); ?>"></div>
                                    </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12"
                    style="margin-top: 10px;">
                    <div class="icon-block icon-block--style-1-v2 block-icon-right block-icon-sm">
                        <div class="block-content">
                             <div class="btn-group pull-right mt-10" role="group">
                                <button type="reset" class="btn btn-gray btn-wide"><i class="fa fa-times"></i>Cancel</button>
                                <button type="submit" class="btn bg-black btn-wide"><i class="fa fa-arrow-right"></i>submit</button>
                            </div> 
                        </div>
                    </div>
                </div>                   
            </div>
        </form>  
        </div>
    </div>
</section>
