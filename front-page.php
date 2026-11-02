<?php
/**
 * The front page template file
 *
 * @package Sneakmax
 */

get_header();
?>

<section class="hero">
          <div class="hero__slider" aria-hidden="true">
            <div class="hero__slide hero__slide--1 hero__slide--active"></div>
            <div class="hero__slide hero__slide--2"></div>
            <div class="hero__slide hero__slide--3"></div>
            <div class="hero__slide hero__slide--4"></div>
            <div class="hero__slide hero__slide--5"></div>
            <div class="hero__slide hero__slide--6"></div>
            <div class="hero__slide hero__slide--7"></div>
            <div class="hero__slide hero__slide--8"></div>
          </div>
          <div class="hero__overlay" aria-hidden="true"></div>
          <div class="container hero__container">
            <span class="hero__badge">Новая коллекция • Релизы 2026</span>
            <h1 class="hero__title">
              Кроссовки известных брендов с&nbsp;доставкой по&nbsp;России и&nbsp;СНГ
            </h1>
            <p class="hero__descr">
              Мы продаем оригинальные кроссовки брендов Nike, Adidas, Puma, New Balance, Reebok и Converse по честным ценам с гарантией и примеркой перед покупкой
            </p>
            <a href="#catalog" class="btn btn-reset btn--primary hero__btn js-move-to">
              Перейти к покупкам
            </a>
          </div>
          <div class="container hero__features">
            <ul class="features list-reset">
              <li class="features__item">
                <div class="features__icon">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                    <path d="m9 12 2 2 4-4"/>
                  </svg>
                </div>
                <div class="features__text">
                  <strong class="features__title">100% Оригинал</strong>
                  <span class="features__desc">Проверка CheckCheck & Poizon</span>
                </div>
              </li>
              <li class="features__item">
                <div class="features__icon">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="1" y="3" width="15" height="13"/>
                    <polygon points="16 8 20 8 23 11 23 16 16 8"/>
                    <circle cx="5.5" cy="18.5" r="2.5"/>
                    <circle cx="18.5" cy="18.5" r="2.5"/>
                  </svg>
                </div>
                <div class="features__text">
                  <strong class="features__title">Быстрая доставка</strong>
                  <span class="features__desc">От 1 дня со склада в Москве</span>
                </div>
              </li>
              <li class="features__item">
                <div class="features__icon">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                  </svg>
                </div>
                <div class="features__text">
                  <strong class="features__title">Примерка до оплаты</strong>
                  <span class="features__desc">Привезем 2 размера на выбор</span>
                </div>
              </li>
              <li class="features__item">
                <div class="features__icon">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="23 4 23 10 17 10"/>
                    <polyline points="1 20 1 14 7 14"/>
                    <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"/>
                  </svg>
                </div>
                <div class="features__text">
                  <strong class="features__title">Гарантия 14 дней</strong>
                  <span class="features__desc">Простой обмен и возврат</span>
                </div>
              </li>
            </ul>
          </div>
        </section>

        <section class="catalog" id="catalog">
          <div class="container catalog__container">
            <div class="catalog__top">
              <h2 class="title catalog__title reveal">Каталог кроссовок</h2>
              <?php
              $total_count = function_exists( 'wp_count_posts' ) ? wp_count_posts( 'product' )->publish : 20;
              ?>
              <span class="catalog__count"><?php printf( esc_html__( 'В наличии %d моделей', 'sneakmax' ), $total_count ? $total_count : 20 ); ?></span>
            </div>
            <div class="catalog__content">
              <div class="catalog__left">
                <div class="catalog-filters">
                  <button type="button" class="btn-reset catalog-filters__toggle" aria-expanded="false" aria-controls="catalogFiltersBody">
                    <span class="catalog-filters__toggle-left">
                      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="4" y1="21" x2="4" y2="14"></line>
                        <line x1="4" y1="10" x2="4" y2="3"></line>
                        <line x1="12" y1="21" x2="12" y2="12"></line>
                        <line x1="12" y1="8" x2="12" y2="3"></line>
                        <line x1="20" y1="21" x2="20" y2="16"></line>
                        <line x1="20" y1="12" x2="20" y2="3"></line>
                        <line x1="1" y1="14" x2="7" y2="14"></line>
                        <line x1="9" y1="8" x2="15" y2="8"></line>
                        <line x1="17" y1="16" x2="23" y2="16"></line>
                      </svg>
                      <span>Фильтры подбора</span>
                    </span>
                    <span class="catalog-filters__toggle-arrow">
                      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                      </svg>
                    </span>
                  </button>
                  <div class="catalog-filters__body" id="catalogFiltersBody">
                    <h3 class="catalog__subtitle">Подбор по&nbsp;параметрам</h3>
                    <div class="catalog__prop">
                      <strong class="catalog__caption">Цена, руб</strong>
                      <div class="catalog-price catalog__prop-inner">
                        <div class="catalog-price__wrapper">
                          <input
                            type="text"
                            class="catalog-price__input"
                            id="input-0"
                            aria-label="Минимальная цена, ₽"
                            placeholder="500"
                          />
                          <input
                            type="text"
                            class="catalog-price__input"
                            id="input-1"
                            aria-label="Максимальная цена, ₽"
                            placeholder="999 999"
                          />
                        </div>
                        <div
                          class="catalog-price__element"
                          id="range-slider"
                        ></div>
                      </div>
                    </div>
                    <div class="catalog__prop">
                      <strong class="catalog__caption">Пол</strong>
                      <div class="catalog__prop-inner catalog__prop-checkboxes">
                        <label class="custom-checkbox">
                          <input type="checkbox" class="custom-checkbox__field" value="Мужской" aria-label="Мужской пол" />
                          <span class="custom-checkbox__content">Мужской</span>
                        </label>
                        <label class="custom-checkbox">
                          <input type="checkbox" class="custom-checkbox__field" value="Женский" aria-label="Женский пол" />
                          <span class="custom-checkbox__content">Женский</span>
                        </label>
                      </div>
                    </div>
                    <div class="catalog__prop">
                      <strong class="catalog__caption">Размер</strong>
                      <div class="catalog__prop-inner">
                        <table class="sizes-table" role="presentation">
                          <caption>
                            Таблица размеров
                          </caption>
                          <tbody>
                            <tr>
                              <td>35</td>
                              <td>36</td>
                              <td>37</td>
                            </tr>
                            <tr>
                              <td>38</td>
                              <td>39</td>
                              <td>40</td>
                            </tr>
                            <tr>
                              <td>41</td>
                              <td>42</td>
                              <td>43</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="catalog-filters__btns">
                      <button class="btn btn-reset catalog__apply btn--secondary">
                        Применить
                      </button>
                      <button class="btn-reset catalog__reset">сбросить</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="catalog__grid">
                <ul class="catalog-list list-reset">
            <?php
            $paged = max( 1, get_query_var( 'paged', 1 ) );
            $catalog_products = function_exists( 'wc_get_products' ) ? wc_get_products( array(
                'status'   => 'publish',
                'limit'    => 9,
                'page'     => $paged,
                'paginate' => true,
            ) ) : (object) array( 'products' => array(), 'total' => 0 );

            if ( ! empty( $catalog_products->products ) ) :
                foreach ( $catalog_products->products as $product ) :
                    sneakmax_render_product_card( $product );
                endforeach;
            else :
                echo '<li class="catalog__empty"><p>' . esc_html__( 'Товары отсутствуют.', 'sneakmax' ) . '</p></li>';
            endif;
            ?>
          </ul>
                <button class="catalog__more btn btn-reset btn--primary">
                  Показать еще
                </button>
              </div>
            </div>
          </div>
        </section>

        <section class="about" id="about">
          <img
            src="<?php echo esc_url( get_template_directory_uri() . '/img/about-figure.svg' ); ?>"
            alt=""
            class="about__figure"
            aria-hidden="true"
            width="439"
            height="500"
            loading="lazy"
          />
          <div class="container about__container">
            <div class="about__text">
              <span class="about__label">Сникер-культура с 2019 года</span>
              <h2 class="title about__title reveal">Оригинальные релизы. Без компромиссов.</h2>
              <div class="about__descr">
                <q class="about__quote">
                  Мы создавали SneakMax как пространство для тех, кто ценит историю и эстетику уличной обуви. Каждая пара проходит ручную многоуровневую верификацию перед отправкой. Для нас кроссовки — это культура и сообщество.
                </q>
                <cite class="about__author">Максим Золотарев, основатель SneakMax</cite>
              </div>
              <ul class="about__stats list-reset">
                <li class="about__stat">
                  <strong class="about__stat-value">6+ лет</strong>
                  <span class="about__stat-label">на рынке</span>
                </li>
                <li class="about__stat">
                  <strong class="about__stat-value">15 000+</strong>
                  <span class="about__stat-label">довольных клиентов</span>
                </li>
                <li class="about__stat">
                  <strong class="about__stat-value">100%</strong>
                  <span class="about__stat-label">проверка CheckCheck</span>
                </li>
              </ul>
            </div>
            <div class="about__image">
              <img
                src="<?php echo esc_url( get_template_directory_uri() . '/img/about.webp' ); ?>"
                alt="Шоурум и лаборатория проверки SneakMax"
                width="680"
                height="580"
                loading="lazy"
              />
            </div>
          </div>
        </section>

        <section class="quiz" id="quiz">
          <div class="container">
            <h2 class="visually-hidden">Подбор товара - квиз</h2>
            <div class="quiz__content">
              <h3 class="title quiz__title">
                Мы подберем идеальную пару для вас
              </h3>
              <p class="quiz__descr">
                Ответьте на три вопроса и мы вышлем каталог с самыми подходящими
                для вас моделями
              </p>
              <form class="quiz-form" method="POST">
                <div class="quiz-questions">
                  <div class="quiz-question">
                    <h3 class="quiz-question__title">Какой тип кроссовок рассматриваете?</h3>
                    <ul class="quiz-question__answers list-reset">
                      <li class="quiz-question__item">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/img/quiz-lifestyle.webp' ); ?>" alt="" aria-hidden="true" width="280" height="220" loading="lazy">
                        <label class="custom-checkbox quiz-question__label">
                          <input type="checkbox" class="custom-checkbox__field quiz-question__answer" data-valid="false" name="type" value="Городские повседневные">
                          <span class="custom-checkbox__content">Городские повседневные</span>
                        </label>
                      </li>
                      <li class="quiz-question__item">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/img/quiz-running.webp' ); ?>" alt="" aria-hidden="true" width="280" height="220" loading="lazy">
                        <label class="custom-checkbox quiz-question__label">
                          <input type="checkbox" class="custom-checkbox__field quiz-question__answer" data-valid="false" name="type" value="Беговые и тренировочные">
                          <span class="custom-checkbox__content">Беговые и тренировочные</span>
                        </label>
                      </li>
                      <li class="quiz-question__item">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/img/quiz-basketball.webp' ); ?>" alt="" aria-hidden="true" width="280" height="220" loading="lazy">
                        <label class="custom-checkbox quiz-question__label">
                          <input type="checkbox" class="custom-checkbox__field quiz-question__answer" data-valid="false" name="type" value="Высокие баскетбольные">
                          <span class="custom-checkbox__content">Высокие баскетбольные</span>
                        </label>
                      </li>
                      <li class="quiz-question__item">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/img/quiz-skate.webp' ); ?>" alt="" aria-hidden="true" width="280" height="220" loading="lazy">
                        <label class="custom-checkbox quiz-question__label">
                          <input type="checkbox" class="custom-checkbox__field quiz-question__answer" data-valid="false" name="type" value="Скейтбординг и кеды">
                          <span class="custom-checkbox__content">Скейтбординг и кеды</span>
                        </label>
                      </li>
                      <li class="quiz-question__item">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/img/quiz-trail.webp' ); ?>" alt="" aria-hidden="true" width="280" height="220" loading="lazy">
                        <label class="custom-checkbox quiz-question__label">
                          <input type="checkbox" class="custom-checkbox__field quiz-question__answer" data-valid="false" name="type" value="Трейл и непогода">
                          <span class="custom-checkbox__content">Трейл и непогода</span>
                        </label>
                      </li>
                      <li class="quiz-question__item">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/img/quiz-retro.webp' ); ?>" alt="" aria-hidden="true" width="280" height="220" loading="lazy">
                        <label class="custom-checkbox quiz-question__label">
                          <input type="checkbox" class="custom-checkbox__field quiz-question__answer" data-valid="false" name="type" value="Ретро-классика">
                          <span class="custom-checkbox__content">Ретро-классика</span>
                        </label>
                      </li>
                    </ul>
                    <div class="quiz-bottom">
                      <div class="quiz-question__count">1 из 3</div>
                      <button type="button" class="btn btn-reset btn--thirdly quiz-question__btn" data-next-btn>Следующий шаг</button>
                    </div>
                  </div>
                </div>
                <div class="last-question">
                  <div class="last-question__form">
                    <h3 class="last-question__title">Получить предложение</h3>
                    <p class="last-question__descr">
                      Получите подборку подходящих для вас моделей на почту
                    </p>
                    <input
                      type="text"
                      name="name"
                      class="input last-question__input"
                      placeholder="Ваше имя"
                      aria-label="Ваше имя"
                      required
                    />
                    <input
                      type="email"
                      name="email"
                      class="input last-question__input"
                      placeholder="E-mail"
                      aria-label="Ваш e-mail"
                      required
                    />
                    <input
                      type="tel"
                      name="phone"
                      class="input last-question__input"
                      placeholder="Номер телефона"
                      aria-label="Номер телефона"
                      required
                    />
                    <button
                      type="submit"
                      class="btn btn-reset btn--primary last-question__btn"
                    >
                      Получить
                    </button>
                    <div class="last-question__decorate">
                      <img
                        src="<?php echo esc_url( get_template_directory_uri() . '/img/phone-catalog.webp' ); ?>"
                        alt="Подборка кроссовок на экране смартфона"
                        width="260"
                        height="450"
                        loading="lazy"
                      />
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </section>

        <section class="team" id="team">
          <img
            src="<?php echo esc_url( get_template_directory_uri() . '/img/team-figure.svg' ); ?>"
            alt=""
            class="team__figure"
            aria-hidden="true"
            width="300"
            height="300"
            loading="lazy"
          />
          <div class="container">
            <h2 class="title team__title reveal">Наша команда</h2>
            <ul class="team__list list-reset grid">
              <li class="team__item">
                <img
                  src="<?php echo esc_url( get_template_directory_uri() . '/img/team-1.webp' ); ?>"
                  alt="Максим Золотарев"
                  class="team__img"
                  width="380"
                  height="400"
                  loading="lazy"
                />
                <strong class="team__subtitle">Максим Золотарев</strong>
                <span class="team__post">Основатель и куратор</span>
              </li>
              <li class="team__item">
                <img
                  src="<?php echo esc_url( get_template_directory_uri() . '/img/team-2.webp' ); ?>"
                  alt="Анна Сергеева"
                  class="team__img"
                  width="380"
                  height="400"
                  loading="lazy"
                />
                <strong class="team__subtitle">Анна Сергеева</strong>
                <span class="team__post">Менеджер по закупкам</span>
              </li>
              <li class="team__item">
                <img
                  src="<?php echo esc_url( get_template_directory_uri() . '/img/team-3.webp' ); ?>"
                  alt="Денис Морозов"
                  class="team__img"
                  width="380"
                  height="400"
                  loading="lazy"
                />
                <strong class="team__subtitle">Денис Морозов</strong>
                <span class="team__post">Контроль подлинности</span>
              </li>
              <li class="team__item">
                <img
                  src="<?php echo esc_url( get_template_directory_uri() . '/img/team-4.webp' ); ?>"
                  alt="Елена Соколова"
                  class="team__img"
                  width="380"
                  height="400"
                  loading="lazy"
                />
                <strong class="team__subtitle">Елена Соколова</strong>
                <span class="team__post">Старший стилист</span>
              </li>
              <li class="team__item">
                <img
                  src="<?php echo esc_url( get_template_directory_uri() . '/img/team-5.webp' ); ?>"
                  alt="Артем Васильев"
                  class="team__img"
                  width="380"
                  height="400"
                  loading="lazy"
                />
                <strong class="team__subtitle">Артем Васильев</strong>
                <span class="team__post">Руководитель логистики</span>
              </li>
              <li class="team__item">
                <img
                  src="<?php echo esc_url( get_template_directory_uri() . '/img/team-6.webp' ); ?>"
                  alt="Кристина Белова"
                  class="team__img"
                  width="380"
                  height="400"
                  loading="lazy"
                />
                <strong class="team__subtitle">Кристина Белова</strong>
                <span class="team__post">Забота о клиентах</span>
              </li>
            </ul>
          </div>
        </section>

        <section class="faq" id="faq">
          <div class="container faq__container">
            <h2 class="title faq__title reveal">Часто задаваемые вопросы</h2>
            <ul class="faq__list list-reset">
              <li class="faq-accordion">
                <button
                  class="faq-accordion__control btn-reset"
                  aria-expanded="false"
                >
                  <span class="faq-accordion__title">Как вы проверяете подлинность кроссовок?</span>
                  <span class="faq-accordion__icon"></span>
                </button>
                <div class="faq-accordion__content" aria-hidden="true">
                  <p>Каждая пара проходит двойную верификацию: физический осмотр экспертами нашего центра аутентификации (проверка швов, маркировок, ультрафиолетовых меток и качества материалов) и цифровую сверку с базами CheckCheck и Poizon. Мы гарантируем 100% оригинальность всех моделей.</p>
                </div>
              </li>
              <li class="faq-accordion">
                <button
                  class="faq-accordion__control btn-reset"
                  aria-expanded="false"
                >
                  <span class="faq-accordion__title">Как работает примерка перед покупкой?</span>
                  <span class="faq-accordion__icon"></span>
                </button>
                <div class="faq-accordion__content" aria-hidden="true">
                  <p>При курьерской доставке вы можете заказать до двух смежных размеров для примерки. У вас будет 15 минут, чтобы примерить обувь и убедиться в идеальной посадке, после чего оплатить только подходящую пару.</p>
                </div>
              </li>
              <li class="faq-accordion">
                <button
                  class="faq-accordion__control btn-reset"
                  aria-expanded="false"
                >
                  <span class="faq-accordion__title">Сколько времени занимает доставка?</span>
                  <span class="faq-accordion__icon"></span>
                </button>
                <div class="faq-accordion__content" aria-hidden="true">
                  <p>По Москве и Санкт-Петербургу доставляем на следующий день собственной курьерской службой. В регионы России и страны СНГ заказы отправляются экспресс-службами СДЭК и Boxberry — средний срок составляет от 2 до 5 рабочих дней.</p>
                </div>
              </li>
              <li class="faq-accordion">
                <button
                  class="faq-accordion__control btn-reset"
                  aria-expanded="false"
                >
                  <span class="faq-accordion__title">Можно ли обменять или вернуть товар?</span>
                  <span class="faq-accordion__icon"></span>
                </button>
                <div class="faq-accordion__content" aria-hidden="true">
                  <p>Да, вы можете вернуть товар или обменять его на другой размер в течение 14 дней с момента получения при условии сохранения товарного вида, заводских пломб, бирок и оригинальной коробки.</p>
                </div>
              </li>
              <li class="faq-accordion">
                <button
                  class="faq-accordion__control btn-reset"
                  aria-expanded="false"
                >
                  <span class="faq-accordion__title">Какие способы оплаты доступны?</span>
                  <span class="faq-accordion__icon"></span>
                </button>
                <div class="faq-accordion__content" aria-hidden="true">
                  <p>Оплатить заказ можно картами Мир, Visa, Mastercard, через Систему быстрых платежей (СБП) со скидкой 3%, а также наличными или банковской картой курьеру при получении после примерки.</p>
                </div>
              </li>
            </ul>
          </div>
        </section>

        <section class="contacts" id="contacts">
          <div class="container contacts__container">
            <div class="contacts__text">
              <h2 class="title contacts__title reveal">Контакты</h2>
              <div class="contacts__item">
                <h3 class="contacts__subtitle">
                  Флагманский шоурум
                  <span class="tooltip">
                    <button
                      class="tooltip__btn btn-reset"
                      aria-describedby="office"
                      aria-label="Описание адреса"
                    >
                      <svg>
                        <use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/img/sprite.svg#tooltip' ); ?>"></use>
                      </svg>
                    </button>
                    <span class="tooltip__txt" role="tooltip" id="office">
                      <span class="visually-hidden">Тултип: </span>
                      Шоурум и пункт самовывоза. Доступна примерка перед покупкой и консультация стилиста.
                    </span>
                  </span>
                </h3>
                <a href="tel:+74957946201" class="contacts__phone">+7 (495) 794-62-01</a>
                <span class="contacts__address"
                  >Москва, ул. Большая Новодмитровская, 36, стр. 2</span
                >
              </div>
              <div class="contacts__item">
                <h3 class="contacts__subtitle">Клиентский сервис и онлайн-заказы</h3>
                <a href="tel:+78005553535" class="contacts__phone">+7 (800) 555-35-35</a>
                <span class="contacts__address"
                  >Ежедневно с 10:00 до 22:00 • Бесплатно по РФ</span
                >
              </div>
              <ul class="social list-reset">
                <li class="social__item">
                  <a
                    href="https://vk.com"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="social__link social__link--vk"
                    aria-label="Мы во Вконтакте"
                  ></a>
                </li>
                <li class="social__item">
                  <a
                    href="https://t.me"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="social__link social__link--insta"
                    aria-label="Наш Telegram-канал"
                  ></a>
                </li>
              </ul>
            </div>
            <div class="contacts__map-wrapper">
              <div class="contacts__map" id="map">
                <iframe
                  src="https://www.openstreetmap.org/export/embed.html?bbox=37.5750%2C55.7980%2C37.5960%2C55.8110&amp;layer=mapnik&amp;marker=55.8052%2C37.5857"
                  width="100%"
                  height="100%"
                  style="border: 0;"
                  loading="lazy"
                  title="Шоурум SneakMax на карте"
                ></iframe>
              </div>
              <div class="contacts__routes">
                <span class="contacts__routes-label">Построить маршрут:</span>
                <div class="contacts__routes-btns">
                  <a
                    href="https://yandex.ru/maps/?rtext=~55.8052,37.5857&rtt=auto"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="btn-reset contacts__route-btn contacts__route-btn--yandex"
                  >
                    Яндекс Карты
                  </a>
                  <a
                    href="https://2gis.ru/moscow/search/55.8052%2C37.5857"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="btn-reset contacts__route-btn contacts__route-btn--2gis"
                  >
                    2ГИС
                  </a>
                  <a
                    href="https://www.google.com/maps/dir/?api=1&destination=55.8052,37.5857"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="btn-reset contacts__route-btn contacts__route-btn--google"
                  >
                    Google Maps
                  </a>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="instagram" id="instagram">
          <h2 class="visually-hidden">Форма и инстаграм-лента</h2>
          <div class="container instagram__container">
            <div class="instagram__left">
              <form action="index.html#" class="callback-form">
                <h3 class="title instagram__title">Есть вопросы?</h3>
                <p class="instagram__descr">
                  Заполните форму и&nbsp;наш менеджер свяжется с&nbsp;вами
                </p>
                <label class="form-label">
                  <input
                    type="text"
                    class="input instagram__input"
                    placeholder="Ваше имя"
                    aria-label="Ваше имя"
                    name="name"
                    data-validate-field="name"
                  />
                </label>
                <label class="form-label">
                  <input
                    type="tel"
                    class="input instagram__input"
                    placeholder="Номер телефона"
                    aria-label="Номер телефона"
                    name="phone"
                    data-validate-field="phone"
                  />
                </label>
                <button class="btn btn--primary btn-reset instagram__btn">
                  Отправить
                </button>
              </form>
            </div>
            <div class="instagram__right">
              <a href="index.html#" class="instagram__link" aria-label="Профиль в Instagram">
                <img
                  src="<?php echo esc_url( get_template_directory_uri() . '/img/instagram.webp' ); ?>"
                  alt="Логотип Instagram"
                  width="157"
                  height="56"
                  loading="lazy"
                />
              </a>
              <div class="instagram__content">
                <article class="instagram__item">
                  <h3 class="instagram__subtitle visually-hidden">
                    Фото кроссовок 1
                  </h3>
                  <img
                    src="<?php echo esc_url( get_template_directory_uri() . '/img/insta-1.webp' ); ?>"
                    alt="Фото кроссовок из Instagram 1"
                    width="565"
                    height="318"
                    loading="lazy"
                  />
                </article>
                <article class="instagram__item">
                  <h3 class="instagram__subtitle visually-hidden">
                    Фото кроссовок 2
                  </h3>
                  <img
                    src="<?php echo esc_url( get_template_directory_uri() . '/img/insta-2.webp' ); ?>"
                    alt="Фото кроссовок из Instagram 2"
                    width="157"
                    height="162"
                    loading="lazy"
                  />
                </article>
                <article class="instagram__item">
                  <h3 class="instagram__subtitle visually-hidden">
                    Фото кроссовок 3
                  </h3>
                  <img
                    src="<?php echo esc_url( get_template_directory_uri() . '/img/insta-3.webp' ); ?>"
                    alt="Фото кроссовок из Instagram 3"
                    width="600"
                    height="320"
                    loading="lazy"
                  />
                </article>
                <article class="instagram__item">
                  <h3 class="instagram__subtitle visually-hidden">
                    Фото кроссовок 4
                  </h3>
                  <img
                    src="<?php echo esc_url( get_template_directory_uri() . '/img/insta-4.webp' ); ?>"
                    alt="Фото кроссовок из Instagram 4"
                    width="275"
                    height="183"
                    loading="lazy"
                  />
                </article>
                <article class="instagram__item">
                  <h3 class="instagram__subtitle visually-hidden">
                    Фото кроссовок 5
                  </h3>
                  <img
                    src="<?php echo esc_url( get_template_directory_uri() . '/img/insta-5.webp' ); ?>"
                    alt="Фото кроссовок из Instagram 5"
                    width="600"
                    height="397"
                    loading="lazy"
                  />
                </article>
              </div>
            </div>
          </div>
        </section>
      

<?php
get_footer();
