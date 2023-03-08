<?php if (!defined('APPLICATION')) exit();

/* Copyright 2013-2016 Zachary Doll */

$sql = Gdn::database()->sql();

// Only insert default actions if none exist
$row = $sql->get('YagaAction', '', 'asc', 1)->firstRow(DATASET_TYPE_ARRAY);
if (!$row) {
    $sql->insert('YagaAction', [
        'ActionID' => 1,
        'Name' => 'Kehu',
        'Description' => 'Ketjun paras viesti',
        'Tooltip' => 'Kehu',
        'CssClass' => 'ReactPointUp',
        'AwardValue' => 5,
        'Permission' => 'Garden.Curation.Manage',
        'Sort' => 0
    
    ]);
    $sql->insert('YagaAction', [
        'ActionID' => 2,
        'Name' => 'Maininta',
        'Description' => 'Olen samaa mieltä',
        'Tooltip' => 'Maininta',
        'CssClass' => 'ReactEye2',
        'AwardValue' => 1,
        'Permission' => 'Yaga.Reactions.Add',
        'Sort' => 1
    ]);
    $sql->insert('YagaAction', [
        'ActionID' => 3,
        'Name' => 'Mahtavaa',
        'Description' => 'Tosi hyvä postaus!',
        'Tooltip' => 'Mahtavaa',
        'CssClass' => 'ReactHeart',
        'AwardValue' => 1,
        'Permission' => 'Yaga.Reactions.Add',
        'Sort' => 2
    ]);
    $sql->insert('YagaAction', [
        'ActionID' => 4,
        'Name' => 'Hauskaa',
        'Description' => 'Tosi hauskaa =)',
        'Tooltip' => 'Hauskaa',
        'CssClass' => 'ReactWink',
        'AwardValue' => 1,
        'Permission' => 'Yaga.Reactions.Add',
        'Sort' => 3
    ]);
    $sql->insert('YagaAction', [
        'ActionID' => 6,
        'Name' => 'Spam',
        'Description' => 'spammäystä =)',
        'Tooltip' => 'Spam',
        'CssClass' => 'ReactWarning',
        'AwardValue' => -5,
        'Permission' => 'Garden.Curation.Manage',
        'Sort' => 5
    ]);
}

// Only insert default badges if none exist
$row = $sql->get('YagaBadge', '', 'asc', 1)->firstRow(DATASET_TYPE_ARRAY);
if (!$row) {
    $sql->insert('YagaBadge', [
        'Name' => 'Ensimmäinen vuosipäiväsi!',
        'Description' => '',
        'Photo' => '/plugins/yaga/design/images/default_badges.svg#anniversary-1',
        'RuleClass' => 'LengthOfService',
        'RuleCriteria' => '{"Duration":"1","Period":"year"}',
        'AwardValue' => 5
    ]);
    $sql->insert('YagaBadge', [
        'Name' => 'Toinen vuosipäiväsi!',
        'Description' => 'Toinen vuosipäiväsi!',
        'Photo' => '/plugins/yaga/design/images/default_badges.svg#anniversary-2',
        'RuleClass' => 'LengthOfService',
        'RuleCriteria' => '{"Duration":"2","Period":"year"}',
        'AwardValue' => 5
    ]);
    $sql->insert('YagaBadge', [
        'Name' => 'Kolmas vuosipäiväsi',
        'Description' => 'Hienoa, että olet ollut kolme vuotta yhteisössämme!',
        'Photo' => '/plugins/yaga/design/images/default_badges.svg#anniversary-3',
        'RuleClass' => 'LengthOfService',
        'RuleCriteria' => '{"Duration":"3","Period":"year"}',
        'AwardValue' => 5
    ]);
    $sql->insert('YagaBadge', [
        'Name' => '5 Mahtavaa',
        'Description' => 'Olet saanut 5 Mahtavaa!',
        'Photo' => '/plugins/yaga/design/images/default_badges.svg#awesome-1',
        'RuleClass' => 'ReactionCount',
        'RuleCriteria' => '{"Target":"5","ActionID":"3"}',
        'AwardValue' => 10
    ]);
    $sql->insert('YagaBadge', [
        'Name' => '25 Mahtavaa',
        'Description' => 'Viestisi ovat tasokkaita!',
        'Photo' => '/plugins/yaga/design/images/default_badges.svg#awesome-2',
        'RuleClass' => 'ReactionCount',
        'RuleCriteria' => '{"Target":"25","ActionID":"3"}',
        'AwardValue' => 10
    ]);
    $sql->insert('YagaBadge', [
        'Name' => '100 Mahtavaa',
        'Description' => 'Sinun ansiostasi forumilla elää ja keskustelut pysyvät tasokkaina!',
        'Photo' => '/plugins/yaga/design/images/default_badges.svg#awesome-3',
        'RuleClass' => 'ReactionCount',
        'RuleCriteria' => '{"Target":"100","ActionID":"3"}',
        'AwardValue' => 10
    ]);
    $sql->insert('YagaBadge', [
        'Name' => '1. viestis',
        'Description' => 'Hyvä alku.',
        'Photo' => '/plugins/yaga/design/images/default_badges.svg#comment-1',
        'RuleClass' => 'PostCount',
        'RuleCriteria' => '{"Comparison":"gte","Target":"1"}',
        'AwardValue' => 2
    ]);
    $sql->insert('YagaBadge', [
        'Name' => '10 viestiä',
        'Description' => '10. viestisi, kiitos.',
        'Photo' => '/plugins/yaga/design/images/default_badges.svg#comment-2',
        'RuleClass' => 'PostCount',
        'RuleCriteria' => '{"Comparison":"gte","Target":"10"}',
        'AwardValue' => 5
    ]);
    $sql->insert('YagaBadge', [
        'Name' => '100. viestisi!',
        'Description' => '100. viestisi! Jatka samaan tahtiin, kiitos.',
        'Photo' => '/plugins/yaga/design/images/default_badges.svg#comment-3',
        'RuleClass' => 'PostCount',
        'RuleCriteria' => '{"Comparison":"gte","Target":"100"}',
        'AwardValue' => 10
    ]);
    $sql->insert('YagaBadge', [
        'Name' => '5 Mainintaa',
        'Description' => 'Viestisi saavat hyviä reaktioita muilta.',
        'Photo' => '/plugins/yaga/design/images/default_badges.svg#insightful-1',
        'RuleClass' => 'ReactionCount',
        'RuleCriteria' => '{"Target":"5","ActionID":"2"}',
        'AwardValue' => 10
    ]);
    $sql->insert('YagaBadge', [
        'Name' => '25 Mainintaa',
        'Description' => 'Jatka samaan malliin, viestisi ovat hyviä.',
        'Photo' => '/plugins/yaga/design/images/default_badges.svg#insightful-2',
        'RuleClass' => 'ReactionCount',
        'RuleCriteria' => '{"Target":"25","ActionID":"2"}',
        'AwardValue' => 10
    ]);
    $sql->insert('YagaBadge', [
        'Name' => '100 Mainintaa',
        'Description' => 'Kiitos erittäin hyvistä viesteistäsi!',
        'Photo' => '/plugins/yaga/design/images/default_badges.svg#insightful-3',
        'RuleClass' => 'ReactionCount',
        'RuleCriteria' => '{"Target":"100","ActionID":"2"}',
        'AwardValue' => 10
    ]);
    $sql->insert('YagaBadge', [
        'Name' => '1. Kehu',
        'Description' => '',
        'Photo' => '/plugins/yaga/design/images/default_badges.svg#promote-1',
        'RuleClass' => 'ReactionCount',
        'RuleCriteria' => '{"Target":"1","ActionID":"1"}',
        'AwardValue' => 10
    ]);
    $sql->insert('YagaBadge', [
        'Name' => '5 Kehua',
        'Description' => 'Kehuja tulee!',
        'Photo' => '/plugins/yaga/design/images/default_badges.svg#promote-2',
        'RuleClass' => 'ReactionCount',
        'RuleCriteria' => '{"Target":"5","ActionID":"1"}',
        'AwardValue' => 10
    ]);
    $sql->insert('YagaBadge', [
        'Name' => '25 Kehua',
        'Description' => 'Kehuja tulee! Jo 25',
        'Photo' => '/plugins/yaga/design/images/default_badges.svg#promote-3',
        'RuleClass' => 'ReactionCount',
        'RuleCriteria' => '{"Target":"25","ActionID":"1"}',
        'AwardValue' => 25
    ]);
    $sql->insert('YagaBadge', [
        'Name' => '50 Kehua',
        'Description' => 'Kehuja tulee! Jo 50',
        'Photo' => '/plugins/yaga/design/images/default_badges.svg#promote-4',
        'RuleClass' => 'ReactionCount',
        'RuleCriteria' => '{"Target":"50","ActionID":"1"}',
        'AwardValue' => 50
    ]);
    $sql->insert('YagaBadge', [
        'Name' => '100 Kehua',
        'Description' => 'Kehuja tulee! Jo täysi 100!',
        'Photo' => '/plugins/yaga/design/images/default_badges.svg#promote-5',
        'RuleClass' => 'ReactionCount',
        'RuleCriteria' => '{"Target":"100","ActionID":"1"}',
        'AwardValue' => 100
    ]);
    $sql->insert('YagaBadge', [
        'Name' => '5 Hauskaa',
        'Description' => 'Viestisi ovat hauskoja!',
        'Photo' => '/plugins/yaga/design/images/default_badges.svg#wink-1',
        'RuleClass' => 'ReactionCount',
        'RuleCriteria' => '{"Target":"5","ActionID":"4"}',
        'AwardValue' => 10
    ]);
    $sql->insert('YagaBadge', [
        'Name' => '25 Hauskaa',
        'Description' => 'Monet pitävät viesteistäsi!',
        'Photo' => '/plugins/yaga/design/images/default_badges.svg#wink-2',
        'RuleClass' => 'ReactionCount',
        'RuleCriteria' => '{"Target":"25","ActionID":"4"}',
        'AwardValue' => 10
    ]);
    $sql->insert('YagaBadge', [
        'Name' => '100 Hauskaa',
        'Description' => 'Hienoa, että kirjoittelet hauskoja viestejä, moni pitää niistä paljon!',
        'Photo' => '/plugins/yaga/design/images/default_badges.svg#wink-3',
        'RuleClass' => 'ReactionCount',
        'RuleCriteria' => '{"Target":"100","ActionID":"4"}',
        'AwardValue' => 10
    ]);
}

// Only insert default ranks if none exist
$row = $sql->get('YagaRank', '', 'asc', 1)->firstRow(DATASET_TYPE_ARRAY);
if (!$row) {
    $sql->insert('YagaRank', [
        'RankID' => 1,
        'Name' => 'Taso 1',
        'Description' => '',
        'Sort' => 1,
        'PointReq' => 0,
        'PostReq' => 0,
        'AgeReq' => 0,
        'Perks' => '{"ConfGarden.EditContentTimeout":"0","PermGarden.Curation.Manage":"revoke","PermPlugins.Signatures.Edit":"revoke","PermPlugins.Tagging.Add":"revoke","ConfPlugins.Emotify.FormatEmoticons":"0","ConfGarden.Format.MeActions":"0"}'
    ]);
    $sql->insert('YagaRank', [
        'RankID' => 2,
        'Name' => 'Taso 2',
        'Description' => 'Taso ylös!',
        'Sort' => 2,
        'PointReq' => 0,
        'PostReq' => 5,
        'AgeReq' => 86400,
        'Perks' => '{"ConfGarden.EditContentTimeout":"0","PermGarden.Curation.Manage":"revoke","PermPlugins.Signatures.Edit":"revoke","PermPlugins.Tagging.Add":"revoke"}'
    ]);
    $sql->insert('YagaRank', [
        'RankID' => 3,
        'Name' => 'Taso 3',
        'Description' => 'Taso ylös! Jo tasolla 3!',
        'Sort' => 3,
        'PointReq' => 15,
        'PostReq' => 50,
        'AgeReq' => 604800,
        'Perks' => '{"ConfGarden.EditContentTimeout":"0","ConfPlugins.Emotify.FormatEmoticons":"1","ConfGarden.Format.MeActions":"1"}'
    ]);
    $sql->insert('YagaRank', [
        'RankID' => 4,
        'Name' => 'Taso 4',
        'Description' => 'Taso 4, olet foorumin kunkku!',
        'Sort' => 4,
        'PointReq' => 75,
        'PostReq' => 200,
        'AgeReq' => 2678400,
        'Perks' => '{"ConfGarden.EditContentTimeout":"604800","PermPlugins.Signatures.Edit":"grant","ConfPlugins.Emotify.FormatEmoticons":"1","ConfGarden.Format.MeActions":"1"}'
    ]);
    $sql->insert('YagaRank', [
        'RankID' => 5,
        'Name' => 'Taso 5',
        'Description' => 'Mieletöntä Taso 5 !!',
        'Sort' => 5,
        'PointReq' => 250,
        'PostReq' => 400,
        'AgeReq' => 7776000,
        'Perks' => '{"ConfGarden.EditContentTimeout":"2592000","PermGarden.Curation.Manage":"grant","PermPlugins.Signatures.Edit":"grant","PermPlugins.Tagging.Add":"grant","ConfPlugins.Emotify.FormatEmoticons":"1","ConfGarden.Format.MeActions":"1"}'
    ]);
}