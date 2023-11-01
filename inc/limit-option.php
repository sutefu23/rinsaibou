<?php

/* 講習会の年度や技能登録登録期限設定 */
class RinsaibouLimitOption {
	private static string $RSB_LIMIT_OPTION = 'rsb_limit_option';
	public function __construct() {
		add_action('admin_init', array($this, 'init_option'));
		add_action('admin_menu', array($this, 'add_admin_limit_setting_page'));
	}

    public function init_option(){
	    register_setting('rsb_limit_option', self::$RSB_LIMIT_OPTION,
            array(
                'type' => 'array',
                'default' => array(
	                'term' => '',
	                'limit_date'  => '',
                ),
            )
        );
    }

    public function add_admin_limit_setting_page(){
        add_menu_page(
            '年度／登録期限設定',
            '年度／登録期限設定',
            'edit_pages',
            'rsb_limit_option_setting',
            array($this, 'display_limit_setting_page'),
            '', //icon
        );
    }

    public function display_limit_setting_page(){
	    $options = get_option(self::$RSB_LIMIT_OPTION);
        ?>
        <style>
            label{
                display: block;
                width: 100%;
                margin-top: 20px;
            }
            #setting_term,
            #setting_limit_date{
                width: 100%;
                height: 40px;
            }
        </style>
        <div class="wrap">
            <h1>年度／登録期限設定</h1>
            <form method="post" action="options.php">
                <label for="setting_term">講習会年度</label>
                <input type="text" name="<?php echo self::$RSB_LIMIT_OPTION ?>[term]" id="setting_term" value="<?php echo $options['term']; ?>">
                <label for="setting_limit_date">登録期限</label>
                <input type="date" name="<?php echo self::$RSB_LIMIT_OPTION ?>[limit_date]" id="setting_limit_date" value="<?php echo $options['limit_date']; ?>">
                <?php
                    settings_fields('rsb_limit_option');
                    do_settings_sections('rsb_limit_option');
                    submit_button();?>
            </form>
        </div>
        <?php
    }

}

return new RinsaibouLimitOption();