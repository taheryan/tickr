<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('title') ?>
تیکت شما
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container my-5">
    <!-- Ticket Section -->
    <div class="card mb-4">
        <div class="card-header">
            <h4 class="card-title"><?= esc($ticket['title']) ?></h4>
        </div>
        <div class="card-body">
            <p><strong>وضعیت:</strong> <?= esc($ticket['status']) ?></p>
            <p><strong>کاربر ایجاد کننده:</strong> <?= esc($user['username']) ?></p>
            <p><strong>ایجاد شده در:</strong> <?= esc($ticket['created_at']) ?></p>
            <p><strong>توضیحات:</strong> <?= esc($ticket['question']) ?></p>
        </div>
    </div>

    <!-- Responses Section -->

</div>

<?= $this->endSection() ?>
