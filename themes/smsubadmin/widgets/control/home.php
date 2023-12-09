<?php $this->layout("_admin"); ?>

<?php $this->insert("widgets/control/sidebar"); ?>

<div class="col-md-9 ms-sm-auto col-lg-9">
    <header>
        <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
            <h3 class="display-6 fw-normal text-body-emphasis">Painel - Controle</h3>

            <article class="radius">
                <h4 class="icon-user">Assinantes</h4>
                <p><?= str_pad($stats->subscriptions, 5, 0, 0); ?></p>
            </article>

            <article class="radius">
                <h4 class="icon-user-plus">Por 30 dias</h4>
                <p><?= str_pad($stats->subscriptionsMonth, 5, 0, 0); ?></p>
            </article>

            <article class="radius">
                <h4 class="icon-calendar-check-o">Este mês:</h4>
                <p>R$ <?= str_price($stats->recurrenceMonth); ?></p>
            </article>

            <article class="radius">
                <h4 class="icon-retweet">Recorrência:</h4>
                <p>R$ <?= str_price($stats->recurrence); ?></p>
            </article>

            <p class="fs-5 text-body-secondary">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It’s built with default Bootstrap components and utilities with little customization.</p>
        </div>
    </header>

    <div class="row row-cols-1 row-cols-md-4 mb-3 text-center">
        <div class="col">
            <div class="card mb-4 border-<?=user()->color?> rounded-3 shadow-sm">
                <div class="card-header border-<?=user()->color?> py-3">
                    <h4 class="my-0 text-<?=user()->color?> fw-normal">Assinantes</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title"><?= str_pad($stats->subscriptions, 5, 0, 0); ?></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>Total de Assinantes</li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">Por 30 dias</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title"><?= str_pad($stats->subscriptionsMonth, 5, 0, 0); ?></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>Assinantes nos últimos 30 dias</li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">Assinantes</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title"><?= str_pad($stats->subscriptions, 5, 0, 0); ?></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>Total de Assinantes</li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">Assinantes</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title"><?= str_pad($stats->subscriptions, 5, 0, 0); ?></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>Total de Assinantes</li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-9 mb-3 text-center">
        <div class="col">
            <article class="radius">
                <h4 class="icon-user">Assinantes</h4>
                <p><?= str_pad($stats->subscriptions, 5, 0, 0); ?></p>
            </article>

            <article class="radius">
                <h4 class="icon-user-plus">Por 30 dias</h4>
                <p><?= str_pad($stats->subscriptionsMonth, 5, 0, 0); ?></p>
            </article>

            <article class="radius">
                <h4 class="icon-calendar-check-o">Este mês:</h4>
                <p>R$ <?= str_price($stats->recurrenceMonth); ?></p>
            </article>

            <article class="radius">
                <h4 class="icon-retweet">Recorrência:</h4>
                <p>R$ <?= str_price($stats->recurrence); ?></p>
            </article>

            <section class="app_control_subs radius">
                <h3 class="icon-heartbeat">Assinaturas:</h3>
                <?php if (!$subscriptions): ?>
                    <div class="message info icon-info">Ainda não existem assinantes em seu APP, assim que eles
                        começarem a chegar você verá os mais recentes aqui. Esperamos que seja em breve :)
                    </div>
                <?php else: ?>
                    <?php foreach ($subscriptions as $subscription): ?>
                        <article class="subscriber">
                            <h5><?= date_fmt($subscription->created_at, "d.m.y \- H\hm"); ?>
                                - <?= $subscription->user()->fullName(); ?></h5>
                            <p><?= $subscription->plan()->name; ?> -
                                R$ <?= str_price($subscription->plan()->price) . "/{$subscription->plan()->period_str}"; ?></p>
                            <p><?= ($subscription->status == "active" ? "Ativa" : "Inativa"); ?></p>
                        </article>
                    <?php endforeach; ?>
                <?php endif; ?>
            </section>
        </div>
    </div>
</div>


