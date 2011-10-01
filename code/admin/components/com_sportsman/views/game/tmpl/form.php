<?php

defined('KOOWA') or die('Restricted access'); 

$root = JURI::root(true);
$site = $root.'/'.str_replace(JPATH_ROOT.DS, '', JPATH_FILES).'/';
$admin = $root.'/'.str_replace(JPATH_ROOT.DS, '', JPATH_ADMINISTRATOR).'/';

//TODO : fix ajax request url & image url?
//TODO : move js code to file
?>

<style src="media://system/css/calendar-jos.css" />

<style src="media://com_sportsman/css/jqueryui/nooku-sportsman/jquery-ui.css" />
<style src="media://com_sportsman/css/form.css" />

<script src="media://com_sportsman/js/jquery.js" />
<script src="media://com_sportsman/js/jquery-ui.js" />

<script>
jQuery.noConflict();

jQuery(function($) {
    var $teams      = $( '#teams' ),
        $home_team  = $( '#home-team' ),
        $away_team  = $( '#away-team' ),
        $tournament = $( '#sportsman_tournament_id' );
    
    var home_icon   = '<a href="#" title="Add home team" class="ui-icon ui-icon-home">Add home</a>',
        away_icon   = '<a href="#" title="Add away team" class="ui-icon ui-icon-arrowthick-1-se">Add away</a>',
        remove_icon = '<a href="#" title="Remove team from game" class="ui-icon ui-icon-close">Remove team</a>';

    initTeams();
    
    $tournament.change(function() {
        //clear lists
        $('.drop ul').html('');
        //clear team id input value
        $('.droppable').children('.team_id').val("");
        
        initTeams();
    });

    // resolve the icons behavior with event delegation
    $('.drop').delegate('li', 'click', function( event ) {
        var $item = $( this ),
            $target = $( event.target );
        
        setSource( $item );
        
        if ( $target.is( "a.ui-icon-home" ) ) {
            moveTeam( $item, $home_team );
        }
        else if ( $target.is( "a.ui-icon-arrowthick-1-se" ) ) {
            moveTeam( $item, $away_team );
        }
        else if ( $target.is( "a.ui-icon-close" ) ) {
            moveTeam( $item, $teams );
        }
    });

    function initTeams() {
        
        var division = $('option:selected', $tournament).data('division');
        if ( division ) { //undefined
            getTeams(division);
        }
    }

    function getTeams (id) {
        $.ajax({
            url: '<?= $admin ?>index.php?option=com_sportsman&view=teams&division='+ id +'&format=json',
            type: 'get',
            dataType: 'json',
            success: function(data) {
                
                printTeams(data, $teams); // populate the teams list
                
                // let the team items be draggable
                $( '.drop li').draggable({
                    cancel: "a.ui-icon", // clicking an icon won't initiate dragging
                    revert: "invalid", // when not dropped, the item will revert back to its initial position
                    containment: $( "#game-container" ).length ? "#game-container" : "document", // stick to demo-frame if present
                    cursor: "move",
                    stack: $('.drop li'),
                    drag: function(event, ui) {
                        setSource( $(this) );
                    }
                });
                // let the home-team be droppable, accepting the teams items
                $('.droppable').droppable({
                    accept: $('.drop li'),
                    activeClass: "ui-state-default",
                    drop: function(event, ui) {
                        moveTeam( ui.draggable, $(this) );
                    }
                });
            }
        });
    }
    
    function printTeams ( data ) {
        var $drop = $('.drop', $teams);
        var $list = $('ul', $drop);
        if ($list.length) {
            $list.html('');
        }
        var $home = $('.drop ul li', $home_team);
        var $away = $('.drop ul li', $away_team);
        var home_id = $home.data('team_id');
        var away_id = $away.data('team_id');
        for(var i = 0; i < data.length; i++) {
            
            var $li = $('<li class="ui-widget-content ui-corner-tr" data-team_id="'+ data[i].id +'">');
                    
            $li.append('<h3 class="ui-widget-header">' + data[i].title + '</h3>')
            .append('<img src="<?= $site ?>' + data[i].logo + '" alt="' + data[i].title + '" width="64" height="64" />');
            
            if( home_id !== '' && String(home_id) === data[i].id ) {
                $li
                .append( remove_icon );
                $home.replaceWith($li);
            }
            else if ( away_id !== '' && String(away_id) === data[i].id ) {
                $li
                .append( remove_icon );
                $away.replaceWith($li);
            }
            else {
                $li
                .append( home_icon )
                .append( away_icon );
                $li.appendTo( $list );
            }
        }
    }
    //move draggable team item & droppable target container
    function moveTeam( $drag, $drop ) {
        var $source = $( '#'+ $drag.data('source') );
        $drag.css ({'top': '0', 'left': '0'}); //align to destination container
        var $drop_container = $('.drop', $drop);
        var $drop_ul = $( "ul", $drop_container );
        var $drop_li = $('li', $drop_ul);
        
        if ( $source.hasClass('game') && $drop.hasClass('game') ) {
            if( $source.attr('id') !== $drop.attr('id') ) {
                switchIcons($drop_li, 'teams');
                // if destination container contains a team item, add that item back to the teams list
                if ($drop_ul.length) {
                    $drop_li.appendTo( $('.drop ul', $teams) );
                }
                // add team id to destination hidden input & remove team id from source hidden input
                $drop.children('.team_id').val( $drag.data('team_id') );
                $source.children('.team_id').val("");
                
                $drop_ul.html('');
            }
        } else if ( $source.hasClass('teams') && $drop.hasClass('game') ) {
            switchIcons($drag, 'game');
            // if destination container contains a team item, add that item back to the teams list
            if ($drop_ul.length) { 
                switchIcons($drop_li, 'teams');
                $drop_li.appendTo( $('.drop ul', $teams) );
            }
            //add team id to destination hidden input
            var team_id = $drag.data('team_id');
            $drop.children('.team_id').val( team_id );
            
            $drop_ul.html('');
        } else if ( $source.hasClass('game') && $drop.hasClass('teams') ) {
            switchIcons($drag, 'teams');
            //clear team id source from hidden input
            $source.children('.team_id').val("");
        }
        $drag.appendTo( $drop_ul );
    }
    // switch icons
    function switchIcons( $item, addTo ) {
        
        if ( addTo === 'game' ) {
            $item
                .find( "a.ui-icon-home" ).remove().end()
                .find( "a.ui-icon-arrowthick-1-se" ).remove().end()
                .append( remove_icon );
        } else if ( addTo === 'teams' ) {
            $item
                .find( "a.ui-icon-close" ).remove().end()
                .append( home_icon )
                .append( away_icon );
        }
    }
    // set the source container of the team being dragged
    function setSource( $item ) {
        var $source = $item.parents('.droppable');
        if($source.hasClass('teams')) {
            $item.data('source', $source.attr('id'));
        } else if($source.hasClass('game')) {
            $item.data('source', $source.attr('id'));
        }
    }
});
</script>

<form action="<?= @route('id='.$game->id) ?>" method="post" id="game-form" class="-koowa-form">
    <div class="grid_8" id="game-container">
        <div class="grid_12 panel title group tournament">
            <label for="tournament" class="mainlabel"><?= @text('Tournament'); ?></label>
            <?=@helper('listbox.tournaments', array('name' => 'sportsman_tournament_id', 'selected' => $game->sportsman_tournament_id)); ?>
        </div>
        <div class="grid_12 panel title droppable teams" id="teams">
            <h2 class="ui-widget-header"><?= @text('Teams') ?></h2>
            <div class="drop">
                <ul class="ui-helper-reset">
                    
                </ul>
            </div>
        </div>
        <div class="grid_5">
            <div class="grid_12 panel title group droppable game" id="home-team">
                <h2 class="ui-widget-header"><?= @text('Home') ?></h2>
                <div class="drop">
                    <ul class="ui-helper-reset">
                    <?php if($game->home_team_id): ?>
                        <li class="ui-widget-content ui-corner-tr" data-team_id="<?= $game->home_team_id ?>"></li>
                    <?php endif; ?>
                    </ul>
                </div>
                <!-- <label for="home_team_score"><?php //@text('Score') ?></label> -->
                <input class="inputbox required" type="text" name="home_team_score" id="home_team_score" size="5" maxlength="3" value="<?= @escape($game->home_team_score) ?>" placeholder="Score" />
                <input type="hidden" name="home_team_id" id="home_team_id" value="0" class="team_id" />
            </div>
        </div>
        <div class="grid_2">
            <div class="versus">
                <h1><?= @text('VS.') ?></h1>
            </div>
        </div>
        <div class="grid_5">
            <div class="grid_12 panel title group droppable game" id="away-team">
                <h2 class="ui-widget-header"><?= @text('Away') ?></h2>
                <div class="drop">
                    <ul class="ui-helper-reset">
                    <?php if($game->away_team_id): ?>
                        <li class="ui-widget-content ui-corner-tr" data-team_id="<?= $game->away_team_id ?>"></li>
                    <?php endif; ?>
                    </ul>
                </div>
                <!-- <label for="away_team_score"><?php //@text('Score') ?></label> -->
                <input class="inputbox required" type="text" name="away_team_score" id="away_team_score" size="5" maxlength="3" value="<?= @escape($game->away_team_score) ?>" placeholder="Score" />
                <input type="hidden" name="away_team_id" id="away_team_id" value="0" class="team_id" />
            </div>
        </div>
    </div>
    <div class="grid_4">
        <div class="panel">
            <h3><?= @text( 'Publish' ); ?></h3>
            <table class="admintable">
                <tr>
                    <td class="key">
                        <label for="created_on"><?= @text('Created on') ?></label>
                    </td>
                    <td>
                        <?= @helper('behavior.calendar', array('date' => $game->game_time, 'name' => 'game_time')); ?>
                    </td>
                </tr>
                <tr>
                    <td class="key">
                        <label for="venue"><?= @text('Venue') ?></label>
                    </td>
                    <td>
                        <input class="inputbox required" type="text" name="venue" id="venue" size="25" maxlength="255" value="<?= @escape($game->venue) ?>" />
                    </td>
                </tr>
            </table>
        </div>
    </div>
</form>