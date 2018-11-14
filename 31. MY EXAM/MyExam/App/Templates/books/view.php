<?php /** @var \App\Data\EditDTO $data */ ?>

<h1>VIEW BOOK</h1>

<div><a href="profile.php">My Profile</a></div><br/>

<div><b>Book Title: </b> <?= $data->getBook()->getTitle() ?></div><br/>
<div><b>Author: </b> <?= $data->getBook()->getAuthor() ?></div><br/>
<div><b>Description: </b> <?= $data->getBook()->getDescription() ?></div><br/>
<div><b>Genre: </b> <?= $data->getBook()->getGenre()->getName() ?></div><br/>
<div><img src="<?= $data->getBook()->getImage() ?>" width="460" height="345"></div><br/>
