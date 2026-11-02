<?php
/**
 * Render template for Sneakmax Quiz Block.
 *
 * @var array    $attributes Block attributes.
 * @var string   $content    Block inner content.
 * @var WP_Block $block      Block instance.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$title    = ! empty( $attributes['title'] ) ? esc_html( $attributes['title'] ) : esc_html__( 'Мы подберем идеальную пару для вас', 'sneakmax' );
$subtitle = ! empty( $attributes['subtitle'] ) ? esc_html( $attributes['subtitle'] ) : esc_html__( 'Ответьте на три вопроса и мы вышлем каталог с самыми подходящими для вас моделями', 'sneakmax' );
$theme_uri = get_template_directory_uri();
?>

<section class="quiz" id="quiz">
  <div class="container">
    <h2 class="visually-hidden"><?php esc_html_e( 'Подбор товара - квиз', 'sneakmax' ); ?></h2>
    <div class="quiz__content">
      <h3 class="title quiz__title"><?php echo $title; ?></h3>
      <p class="quiz__descr"><?php echo $subtitle; ?></p>

      <form class="quiz-form" method="POST">
        <div class="quiz-questions">
          <!-- Step 1: Type -->
          <div class="quiz-question">
            <h3 class="quiz-question__title"><?php esc_html_e( 'Какой тип кроссовок рассматриваете?', 'sneakmax' ); ?></h3>
            <ul class="quiz-question__answers list-reset">
              <li class="quiz-question__item">
                <img src="<?php echo esc_url( $theme_uri . '/img/quiz-lifestyle.webp' ); ?>" alt="" aria-hidden="true" width="280" height="220" loading="lazy">
                <label class="custom-checkbox quiz-question__label">
                  <input type="checkbox" class="custom-checkbox__field quiz-question__answer" data-valid="false" name="type" value="Городские повседневные">
                  <span class="custom-checkbox__content"><?php esc_html_e( 'Городские повседневные', 'sneakmax' ); ?></span>
                </label>
              </li>
              <li class="quiz-question__item">
                <img src="<?php echo esc_url( $theme_uri . '/img/quiz-running.webp' ); ?>" alt="" aria-hidden="true" width="280" height="220" loading="lazy">
                <label class="custom-checkbox quiz-question__label">
                  <input type="checkbox" class="custom-checkbox__field quiz-question__answer" data-valid="false" name="type" value="Беговые и тренировочные">
                  <span class="custom-checkbox__content"><?php esc_html_e( 'Беговые и тренировочные', 'sneakmax' ); ?></span>
                </label>
              </li>
              <li class="quiz-question__item">
                <img src="<?php echo esc_url( $theme_uri . '/img/quiz-basketball.webp' ); ?>" alt="" aria-hidden="true" width="280" height="220" loading="lazy">
                <label class="custom-checkbox quiz-question__label">
                  <input type="checkbox" class="custom-checkbox__field quiz-question__answer" data-valid="false" name="type" value="Высокие баскетбольные">
                  <span class="custom-checkbox__content"><?php esc_html_e( 'Высокие баскетбольные', 'sneakmax' ); ?></span>
                </label>
              </li>
              <li class="quiz-question__item">
                <img src="<?php echo esc_url( $theme_uri . '/img/quiz-skate.webp' ); ?>" alt="" aria-hidden="true" width="280" height="220" loading="lazy">
                <label class="custom-checkbox quiz-question__label">
                  <input type="checkbox" class="custom-checkbox__field quiz-question__answer" data-valid="false" name="type" value="Скейтбординг и кеды">
                  <span class="custom-checkbox__content"><?php esc_html_e( 'Скейтбординг и кеды', 'sneakmax' ); ?></span>
                </label>
              </li>
              <li class="quiz-question__item">
                <img src="<?php echo esc_url( $theme_uri . '/img/quiz-trail.webp' ); ?>" alt="" aria-hidden="true" width="280" height="220" loading="lazy">
                <label class="custom-checkbox quiz-question__label">
                  <input type="checkbox" class="custom-checkbox__field quiz-question__answer" data-valid="false" name="type" value="Трейл и непогода">
                  <span class="custom-checkbox__content"><?php esc_html_e( 'Трейл и непогода', 'sneakmax' ); ?></span>
                </label>
              </li>
              <li class="quiz-question__item">
                <img src="<?php echo esc_url( $theme_uri . '/img/quiz-retro.webp' ); ?>" alt="" aria-hidden="true" width="280" height="220" loading="lazy">
                <label class="custom-checkbox quiz-question__label">
                  <input type="checkbox" class="custom-checkbox__field quiz-question__answer" data-valid="false" name="type" value="Ретро-классика">
                  <span class="custom-checkbox__content"><?php esc_html_e( 'Ретро-классика', 'sneakmax' ); ?></span>
                </label>
              </li>
            </ul>
          </div>

          <!-- Step 2: Size -->
          <div class="quiz-question">
            <h3 class="quiz-question__title"><?php esc_html_e( 'Какой размер вам подойдет?', 'sneakmax' ); ?></h3>
            <div class="quiz-sizes">
              <span class="quiz-sizes__notice"><?php esc_html_e( 'Выберите один или несколько европейских размеров (EU):', 'sneakmax' ); ?></span>
              <ul class="quiz-sizes__list list-reset">
                <?php
                $sizes = array( '36', '37', '38', '39', '40', '41', '42', '43', '44', '45', '46' );
                foreach ( $sizes as $size ) :
                ?>
                  <li class="quiz-sizes__item">
                    <label class="custom-checkbox quiz-sizes__label">
                      <input type="checkbox" class="custom-checkbox__field quiz-question__answer" data-valid="false" name="size" value="<?php echo esc_attr( $size ); ?>">
                      <span class="custom-checkbox__content"><?php echo esc_html( $size ); ?></span>
                    </label>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>

          <!-- Step 3: Message -->
          <div class="quiz-question">
            <h3 class="quiz-question__title"><?php esc_html_e( 'Уточните любые пожелания по подбору (необязательно)', 'sneakmax' ); ?></h3>
            <label class="quiz-question__label-textarea">
              <textarea class="quiz-question__textarea" name="message" placeholder="<?php esc_attr_e( 'Например: ищу модель на широкую стопу с мягкой амортизацией для бега по асфальту...', 'sneakmax' ); ?>"></textarea>
            </label>
          </div>
        </div>

        <div class="quiz-bottom">
          <span class="quiz-bottom__count"><?php printf( esc_html__( '%s из %s', 'sneakmax' ), '<span class="quiz-bottom__current">1</span>', '<span class="quiz-bottom__total">3</span>' ); ?></span>
          <button type="button" class="btn-reset quiz-bottom__btn button button-second"><?php esc_html_e( 'Следующий шаг', 'sneakmax' ); ?></button>
        </div>
      </form>

      <div class="quiz-form-final">
        <h3 class="quiz-form-final__title"><?php esc_html_e( 'Ваша подборка почти готова!', 'sneakmax' ); ?></h3>
        <p class="quiz-form-final__desc"><?php esc_html_e( 'Оставьте ваши контактные данные, и персональный консультант отправит каталог с подходящими моделями и размерами.', 'sneakmax' ); ?></p>
        <form class="quiz-final-send-form" method="POST">
          <div class="quiz-final-send-form__fields">
            <input type="text" name="name" class="quiz-final-send-form__input" placeholder="<?php esc_attr_e( 'Ваше имя', 'sneakmax' ); ?>" required>
            <input type="tel" name="phone" class="quiz-final-send-form__input" placeholder="<?php esc_attr_e( 'Номер телефона', 'sneakmax' ); ?>" required>
            <input type="email" name="email" class="quiz-final-send-form__input" placeholder="<?php esc_attr_e( 'E-mail для каталога', 'sneakmax' ); ?>">
          </div>
          <button type="submit" class="btn-reset button button-primary quiz-final-send-form__btn"><?php esc_html_e( 'Получить подборку с каталогом', 'sneakmax' ); ?></button>
          <span class="quiz-final-send-form__policy"><?php esc_html_e( 'Нажимая на кнопку, вы соглашаетесь на обработку персональных данных', 'sneakmax' ); ?></span>
        </form>
      </div>
    </div>
  </div>
</section>
