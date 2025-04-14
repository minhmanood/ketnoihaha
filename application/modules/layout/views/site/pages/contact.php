<style>
    .border-effect {
        position: relative;
        display: inline-block;
        width: 100%;
        margin-bottom: 15px;
    }

    .border-effect input,
    .border-effect textarea {
        width: 100%;
        padding: 10px 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .border-effect input:focus,
    .border-effect textarea:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        outline: none;
    }

    button#submit {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 14px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button#submit:hover {
        background-color: #0056b3;
    }

    .box-maps {
        margin-top: 30px;
        border: 1px solid #ddd;
        border-radius: 5px;
        overflow: hidden;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    @media (max-width: 768px) {

        .border-effect input,
        .border-effect textarea {
            font-size: 12px;
            padding: 8px 10px;
        }

        button#submit {
            font-size: 12px;
            padding: 8px 15px;
        }
    }
</style>
<section id="boxes" class="sm-my ">
    <div class="container-sm">
        <div class="t-center row">
            <div class="col-sm-12 col-xs-12 sm-mt-mobile">
                <div data-toggle="modal" data-target="#modal1" class="c-pointer bg-gray1-hover border-1 border-gray2 slow sm-py click-effect dark-effect block">
                    <div class="inline-block">
                        <i class="icon-home text-lg2"></i>
                    </div>
                    <h3 class="xxs-mt uppercase fjalla"><?php echo isset($info_address['company']) ? $info_address['company'] : ''; ?></h3>
                    <p class="bold-subtitle lh-sm xxs-mt"><?php echo isset($info_address['address']) ? $info_address['address'] : ''; ?></p>
                    <a href="mailto:<?php echo isset($info_address['email']) ? $info_address['email'] : ''; ?>" class="bold-subtitle underline-hover xxs-mt block"><?php echo isset($info_address['email']) ? $info_address['email'] : ''; ?></a>
                    <h2 class="bold-subtitle underline-hover mini-mt block colored"><?php echo isset($info_address['phone']) ? $info_address['phone'] : ''; ?></h2>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="divider-1 font-14 dark uppercase container-sm extrabold sm-mt">
    <span>Liên hệ với chúng tôi</span>
</div>
<section id="contact" class="sm-mt">
    <?php echo form_open(current_url(), array('class' => 'form-horizontal')); ?>

    <div class="form-group">
        <label class="control-label">Họ tên *</label>
        <?php
        echo form_input(array(
            'name' => 'full_name',
            'class' => 'form-control',
            'placeholder' => 'Nhập họ tên',
            'value' => set_value('full_name')
        ));
        echo form_error('full_name');
        ?>
    </div>

    <div class="form-group">
        <label class="control-label">Email *</label>
        <?php
        echo form_input(array(
            'name' => 'email',
            'type' => 'email',
            'class' => 'form-control',
            'placeholder' => 'Nhập email',
            'value' => set_value('email')
        ));
        echo form_error('email');
        ?>
    </div>

    <div class="form-group">
        <label class="control-label">Chủ đề *</label>
        <?php
        echo form_input(array(
            'name' => 'subject',
            'class' => 'form-control',
            'placeholder' => 'Nhập chủ đề',
            'value' => set_value('subject')
        ));
        echo form_error('subject');
        ?>
    </div>

    <div class="form-group">
        <label class="control-label">Nội dung *</label>
        <?php
        echo form_textarea(array(
            'name' => 'message',
            'class' => 'form-control',
            'placeholder' => 'Nhập nội dung',
            'rows' => 5,
            'value' => set_value('message')
        ));
        echo form_error('message');
        ?>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Gửi liên hệ</button>
    </div>

    <?php echo form_close(); ?>
    </form>
    </div>
    <div class="container">



        <div class="row">
            <div class="col-md-12">
                <div class="box-maps">
                    <div class="embed-responsive embed-responsive-4by3">
                        <?php echo isset($iframe_map) ? $iframe_map : ''; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('block-slogun'); ?>