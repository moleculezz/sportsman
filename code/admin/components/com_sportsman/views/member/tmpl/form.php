<?php
/**
 * @version     $Id: form.php 3318 2012-02-10 15:43:35Z johanjanssens $
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Users
 * @copyright   Copyright (C) 2011 - 2012 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */
defined('KOOWA') or die( 'Restricted access' ); ?>

<script src="media://lib_koowa/js/koowa.js" />
<style src="media://lib_koowa/css/koowa.css" />

<?= @helper('behavior.validator') ?>
<? /* @TODO move this into a separate JS file */ ?>
<script>
if(Form && Form.Validator) {
    Form.Validator.add('validate-match', {
		errorMsg: function(element, props){
			return Form.Validator.getMsg('match').substitute({matchName: props.matchName || document.id(props.matchInput).get('name')});
		},
		test: function(element, props){
			var eleVal = element.get('value');
			var matchVal = document.id(props.matchInput) && document.id(props.matchInput).get('value');
			return matchVal ? eleVal == matchVal : true;
		}
	});
}
</script>

<?= @template('com://admin/default.view.form.toolbar'); ?>

<form action="" method="post" class="-koowa-form">
	<div class="grid_8">
        <div class="panel">
            <h3><?= @text('Membership Details') ?></h3>
            <table class="admintable">
                <tr>
                    <td class="key">
                        <label for="name">
                            <?= @text('Name') ?>:
                        </label>
                    </td>
                    <td>
                        <input class="required" type="text" name="name" value="<?= $member->name ?>" size="40" />
                    </td>
                </tr>
                <tr>
                    <td class="key">
                        <label for="email">
                            <?= @text('E-Mail') ?>:
                        </label>
                    </td>
                    <td>
                        <input class="required validate-email" type="text" name="email" value="<?= $member->email ?>" size="40" />
                    </td>
                </tr>
                <tr>
                    <td class="key">
                        <label for="dob">
                            <?= @text('Date of birth') ?>:
                        </label>
                    </td>
                    <td>
                        <input class="required" type="text" name="dob" value="<?= $member->dob ?>" size="40" />
                    </td>
                </tr>
                <tr>
                    <td class="key">
                        <label for="gender">
                            <?= @text('Gender') ?>:
                        </label>
                    </td>
                    <td>
                        <input class="required maxLength:1" type="text" name="gender" value="<?= $member->gender ?>" maxlength="1" size="2" />
                    </td>
                </tr>
                <tr>
                    <td class="key">
                        <label for="address">
                            <?= @text('Address') ?>:
                        </label>
                    </td>
                    <td>
                        <input class="required" type="text" name="address" value="<?= $member->address ?>" size="40" />
                    </td>
                </tr>
                <tr>
                    <td class="key">
                        <label for="city">
                            <?= @text('City') ?>:
                        </label>
                    </td>
                    <td>
                        <input class="required" type="text" name="city" value="<?= $member->city ?>" size="40" />
                    </td>
                </tr>
            </table>
        </div>
		<div class="panel">
			<h3><?= @text('User Details') ?></h3>
			<table class="admintable">
				<tr>
					<td class="key">
						<label for="username">
						    <?= @text('Username') ?>:
						</label>
					</td>
					<td>
						<input class="required minLength:2" type="text" name="username" value="<?= $member->username ?>" maxlength="150" size="40" />
					</td>
				</tr>
				<tr>
					<td class="key">
						<label for="password">
						    <?= @text('New Password') ?>:
						</label>
					</td>
					<td>
						<input id="password" type="password" name="password" maxlength="100" size="40" />
					</td>
				</tr>
				<tr>
					<td class="key">
						<label for="password_verify">
						    <?= @text('Verify Password') ?>:
						</label>
					</td>
					<td>
						<input class="validate-match matchInput:'password' matchName:'password'" type="password" name="password_verify" maxlength="100" size="40" />
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="grid_4">
		<div class="panel">
			<h3><?= @text('System Information') ?></h3>
			<table class="admintable">
				<tr>
					<td class="key">
						<label for="enabled">
						    <?= @text('Enable User') ?>:
						</label>
					</td>
					<td>
						<?= @helper('select.booleanlist', array('name' => 'enabled', 'selected' => $member->enabled)) ?>
					</td>
				</tr>
				<tr>
					<td class="key">
						<label for="send_email">
						    <?= @text('Receive System E-mails') ?>:
						</label>
					</td>
					<td>
						<?= @helper('select.booleanlist', array('name' => 'send_email', 'selected' => $member->send_email)) ?>
					</td>
				</tr>
				<? if (!$member->isNew()): ?>
				<tr>
					<td class="key">
						<?= @text('Register Date') ?>:
					</td>
					<td>
						<? if($member->last_visited_on == '0000-00-00 00:00:00') : ?>
							<?= @text('Never') ?>
						<? else : ?>
							<?= @helper('date.format', array('date' => $member->registered_on, 'format' => '%Y-%m-%d %H:%M:%S')) ?>
						<? endif ?>
					</td>
				</tr>
				<tr>
					<td class="key">
						<?= @text('Last Visit') ?>:
					</td>
					<td>
						<? if($member->last_visited_on == '0000-00-00 00:00:00') : ?>
							<?= @text('Never') ?>
						<? else : ?>
							<?= @helper('date.format', array('date' => $member->last_visited_on, 'format' => '%Y-%m-%d %H:%M:%S')) ?>
						<? endif ?>
					</td>
				</tr>
				<? endif; ?>
			</table>
		</div>
		<div class="panel groups">
			<h3><?= @text('Group') ?></h3>
			<?= @helper('com://admin/groups.template.helper.select.groups', array('selected' => $member->id ? $member->users_group_id : 18, 'name' => 'users_group_id', 'attribs' => array('class' => 'required'))) ?>
		</div>
	</div>
</form>