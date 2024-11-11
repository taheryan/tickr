<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('title') ?>
تیکت های شما
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="ticket-container">
    <div class="tickets-view-head">
        <div>
            <h2 class="page-title">تیکت های شما</h2>
        </div>
        <div>
            <button type="button" class="btn btn-primary mb-3" onclick="window.location.href='http://localhost/tickr/public/tickets/NewTicket'">ایجاد تیکت جدید</button>
        </div>
    </div>
    <!-- List of Tickets -->
    <div class="ticket-list">
        <?php foreach ($tickets as $ticket): ?>
            <div class="ticket-item" onclick="window.location.href='http://localhost/tickr/public/tickets/view/<?= $ticket['id'] ?>'">
                <div class="ticket-title-status-wrap">

                    <div class="ticket-title"><?= $ticket['title'] ?></div>
                    <div class="ticket-status <?= $ticket['status'] ?>"><?= ucfirst($ticket['status']) ?></div>
                </div>
                <div class="ticket-question my-3"><?= $ticket['question'] ?></div>

                <div class="ticket-date"><?= date('d F, Y', strtotime($ticket['created_at'])) ?></div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection() ?>