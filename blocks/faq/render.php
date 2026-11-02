<?php
/**
 * Render template for Sneakmax FAQ Block.
 *
 * @var array    $attributes Block attributes.
 * @var string   $content    Block inner content.
 * @var WP_Block $block      Block instance.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$title = ! empty( $attributes['title'] ) ? esc_html( $attributes['title'] ) : esc_html__( 'Часто задаваемые вопросы', 'sneakmax' );
?>

<section class="faq" id="faq">
  <div class="container faq__container">
    <h2 class="title faq__title reveal"><?php echo $title; ?></h2>
    <ul class="faq__list list-reset">
      <li class="faq__item is-open">
        <button type="button" class="btn-reset faq__btn" aria-expanded="true">
          <span class="faq__question"><?php esc_html_e( 'Вопрос 1: Вся ли обувь оригинальная и как это проверить?', 'sneakmax' ); ?></span>
          <span class="faq__icon" aria-hidden="true">+</span>
        </button>
        <div class="faq__answer">
          <p class="faq__text">
            <?php esc_html_e( 'Да, абсолютно вся продукция в каталоге является на 100% оригинальной. Мы закупаем обувь напрямую у официальных дистрибьюторов в Европе и США. Каждая пара имеет фирменную коробку, бирки, уникальный артикул производителя и проверяется по QR-коду и системе «Честный ЗНАК».', 'sneakmax' ); ?>
          </p>
        </div>
      </li>
      <li class="faq__item">
        <button type="button" class="btn-reset faq__btn" aria-expanded="false">
          <span class="faq__question"><?php esc_html_e( 'Вопрос 2: Как подобрать правильный размер?', 'sneakmax' ); ?></span>
          <span class="faq__icon" aria-hidden="true">+</span>
        </button>
        <div class="faq__answer">
          <p class="faq__text">
            <?php esc_html_e( 'Воспользуйтесь нашим интерактивным квизом выше или свяжитесь с менеджером. При курьерской доставке мы бесплатно привозим 2 смежных размера для комфортной примерки перед оплатой.', 'sneakmax' ); ?>
          </p>
        </div>
      </li>
      <li class="faq__item">
        <button type="button" class="btn-reset faq__btn" aria-expanded="false">
          <span class="faq__question"><?php esc_html_e( 'Вопрос 3: Сколько занимает доставка по России?', 'sneakmax' ); ?></span>
          <span class="faq__icon" aria-hidden="true">+</span>
        </button>
        <div class="faq__answer">
          <p class="faq__text">
            <?php esc_html_e( 'По Москве и Санкт-Петербургу доставка курьером осуществляется на следующий день. В другие регионы РФ отправляем СДЭК или Почтой России — средний срок от 2 до 5 рабочих дней с трек-номером.', 'sneakmax' ); ?>
          </p>
        </div>
      </li>
      <li class="faq__item">
        <button type="button" class="btn-reset faq__btn" aria-expanded="false">
          <span class="faq__question"><?php esc_html_e( 'Вопрос 4: Можно ли вернуть или обменять кроссовки, если они не подошли?', 'sneakmax' ); ?></span>
          <span class="faq__icon" aria-hidden="true">+</span>
        </button>
        <div class="faq__answer">
          <p class="faq__text">
            <?php esc_html_e( 'Да! В течение 14 дней вы можете обменять обувь на другой размер/модель или оформить возврат средств при сохранении товарного вида, оригинальной упаковки и чека.', 'sneakmax' ); ?>
          </p>
        </div>
      </li>
    </ul>
  </div>
</section>
