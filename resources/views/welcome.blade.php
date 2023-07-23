@extends('layouts.site')

@section('content')
    <div class="main__banner">
        <div class="container">
            <div class="main__banner_content">
                <div class="main__banner_text">
                    <h2>Ортопедические услуги для всей семьи</h2>
                    Здоровье – это одна из главных человеческих ценностей. Хотите воспользоваться качественными ортопедическими услугами для всей семьи? Обратитесь в Ортомастер. Здесь работают специалисты, которые обязательно помогут решить вашу проблему со
                    здоровьем ног, проведут грамотную диагностику и назначат эффективные средства.
                </div>
                <div class="main__banner_mobile_wrapper">
                    <div class="main__banner_mobile_text_wrapper">
                        <div class="main__banner_mobile_title">
                            <b>8</b> ЛЕТ ОПЫТА
                        </div>
                        <div class="main__banner_mobile_text">
                            средний стаж работы<br>наших врачей
                        </div>
                    </div>
                    <img src="img/mobile.webp" class="main__mobile_background" alt="background">
                    <img src="img/main_mobile_mask.svg" class="main_mobile_mask" alt="icon">
                </div>
                {{--<a href="#" class="main__banner-button button" data-hystmodal="#registerModal">--}}
                {{--    Записаться на приём--}}
                {{--</a>--}}
            </div>
        </div>
    </div>
    <div class="advantages">
        <div class="container">
            <h2 class="advantages__title">
                Наши преимущества
            </h2>
            <div class="advantages__items_wrapper">
                <div class="advantages__item">
                    <img src="img/icon_adv1.svg" alt="icon">
                    <div class="advantages__item_title">
                        ОПЫТНЫЕ ПРОФЕССИОНАЛЫ
                    </div>
                    <div class="advantages__item_text">
                        В нашей клинике работают специалисты с большим стажем работы
                    </div>
                </div>
                <div class="advantages__item">
                    <img src="img/icon_adv2.svg" alt="icon">
                    <div class="advantages__item_title">
                        СОВРЕМЕННОЕ ОБОРУДОВАНИЕ
                    </div>
                    <div class="advantages__item_text">
                        Оснащение клиники позволяет проводить необходимый спектр диагностических мероприятий
                    </div>
                </div>
                <div class="advantages__item">
                    <img src="img/icon_adv3.svg" alt="icon">
                    <div class="advantages__item_title">
                        ИНДИВИДУАЛЬНЫЙ ПОДХОД
                    </div>
                    <div class="advantages__item_text">
                        Врач ориентируется на индивидуальные особенности пациентов
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--<div class="main__services">--}}
    {{--    <div class="container">--}}
    {{--        <div class="main__services_top">--}}
    {{--            <div class="main__services_top_content">--}}
    {{--                <h2>Медицинские услуги</h2>--}}
    {{--                Клиника специализируется на оказании амбулаторно-поликлинической и лечебно-диагностической помощи. В клинике ведут прием следующие специалисты: педиатр, терапевт, невролог, кардиолог, офтальмолог, врач ультразвуковой диагностики. В нашей клинике можно--}}
    {{--                сдать любые анализы, воспользоваться услугами процедурного кабинета, поставить прививки детям и взрослым, сделать ЭКГ, холтер ЭКГ и СМАД. Также у нас возможно оформление и выдачи медицинской документации, в том числе и листков временной--}}
    {{--                нетрудоспособности. Мы создали условия для комфортного обследования и эффективного лечения.--}}
    {{--            </div>--}}
    {{--<a href="#" class="main__services-button button">--}}
    {{--    Смотреть все услуги--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--<div class="main__services_bottom">--}}
    {{--    <div class="cards mobile__cards">--}}
    {{--        <div class="card__wrapper">--}}
    {{--            <a href="#" class="card">--}}
    {{--                <img class="card__icon" src="img/card_icon_doc.svg" alt="icon">--}}
    {{--                <div class="card__title">--}}
    {{--                    Прием специалистов--}}
    {{--                </div>--}}
    {{--                <div class="card__text">--}}
    {{--                    У нас ведут прием специалисты с больщим стажем работы--}}
    {{--                </div>--}}
    {{--                <div  class="card__link">--}}
    {{--                    подробнее--}}
    {{--                </div>--}}
    {{--            </a>--}}
    {{--        </div>--}}
    {{--        <div class="card__wrapper">--}}
    {{--            <a href="#" class="card">--}}
    {{--                <img class="card__icon" src="img/card_icon_back.svg" alt="icon">--}}
    {{--                <div class="card__title">--}}
    {{--                    Массаж--}}
    {{--                </div>--}}
    {{--                <div class="card__text">--}}
    {{--                    Услуги массажиста для детей и взрослых--}}
    {{--                </div>--}}
    {{--                <div  class="card__link">--}}
    {{--                    подробнее--}}
    {{--                </div>--}}
    {{--            </a>--}}
    {{--        </div>--}}
    {{--        <div class="card__wrapper">--}}
    {{--            <a href="#" class="card">--}}
    {{--                <img class="card__icon" src="img/card_icon_waist.svg" alt="icon">--}}
    {{--                <div class="card__title">--}}
    {{--                    Программы с лишним весом--}}
    {{--                </div>--}}
    {{--                <div class="card__text">--}}
    {{--                    Получите персональную программу похудения на основе веса, роста, возраста и привычек--}}
    {{--                </div>--}}
    {{--                <div  class="card__link">--}}
    {{--                    подробнее--}}
    {{--                </div>--}}
    {{--            </a>--}}
    {{--        </div>--}}
    {{--        <div class="card__wrapper">--}}
    {{--            <a href="#" class="card">--}}
    {{--                <img class="card__icon" src="img/card_icon_flask.svg" alt="icon">--}}
    {{--                <div class="card__title">--}}
    {{--                    Процедурный кабинет <span class=""> с забором анализов</span>--}}
    {{--                </div>--}}
    {{--                <div class="card__text">--}}
    {{--                    Забор крови на различные исследования и анализы--}}
    {{--                </div>--}}
    {{--                <div  class="card__link">--}}
    {{--                    подробнее--}}
    {{--                </div>--}}
    {{--            </a>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--    <a href="services.php" class="main__services-button button">--}}
    {{--        Смотреть все услуги--}}
    {{--    </a>--}}
    {{--</div>--}}
    {{--    </div>--}}
    {{--</div>--}}
    {{--<div class="main__docs">--}}
    {{--    <div class="container">--}}
    {{--        <div class="main__docs_top_content">--}}
    {{--            <h2 class="main__docs_top-title">У нас работают<br>врачи высшей категории</h2>--}}
    {{--            <div class="main__docs_top-text">с опытом от 5 лет</div>--}}
    {{--        </div>--}}
    {{--        <div class="main__docs_slider">--}}
    {{--            <div class="main__docs_slider_left">--}}
    {{--                <a href="#_1" class="main__docs_handler_item">--}}
    {{--                    <img src="img/doc1.jpg" alt="" class="main__docs_handler_ava">--}}
    {{--                    <div class="main__docs_handler_text">--}}
    {{--                        <div class="main__docs_handler_surname">--}}
    {{--                            Верещагина--}}
    {{--                        </div>--}}
    {{--                        <div class="main__docs_handler_name">--}}
    {{--                            Юлия Андреевна--}}
    {{--                        </div>--}}
    {{--                        <div class="main__docs_handler_spec">--}}
    {{--                            Педиатр--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </a>--}}
    {{--                <a href="#_2" class="main__docs_handler_item">--}}
    {{--                    <img src="img/doc2.jpg" alt="" class="main__docs_handler_ava">--}}
    {{--                    <div class="main__docs_handler_text">--}}
    {{--                        <div class="main__docs_handler_surname">--}}
    {{--                            Верещагин--}}
    {{--                        </div>--}}
    {{--                        <div class="main__docs_handler_name">--}}
    {{--                            Андрей Николаевич--}}
    {{--                        </div>--}}
    {{--                        <div class="main__docs_handler_spec">--}}
    {{--                            Терапевт--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </a>--}}
    {{--                <a href="#_3" class="main__docs_handler_item">--}}
    {{--                    <img src="img/doc3.jpg" alt="" class="main__docs_handler_ava">--}}
    {{--                    <div class="main__docs_handler_text">--}}
    {{--                        <div class="main__docs_handler_surname">--}}
    {{--                            Олишевская--}}
    {{--                        </div>--}}
    {{--                        <div class="main__docs_handler_name">--}}
    {{--                            Анна Александровна--}}
    {{--                        </div>--}}
    {{--                        <div class="main__docs_handler_spec">--}}
    {{--                            Невролог--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </a>--}}
    {{--                <a href="#_4" class="main__docs_handler_item">--}}
    {{--                    <img src="img/doc4.jpg" alt="" class="main__docs_handler_ava">--}}
    {{--                    <div class="main__docs_handler_text">--}}
    {{--                        <div class="main__docs_handler_surname">--}}
    {{--                            Канц--}}
    {{--                        </div>--}}
    {{--                        <div class="main__docs_handler_name">--}}
    {{--                            Алёна Петровна--}}
    {{--                        </div>--}}
    {{--                        <div class="main__docs_handler_spec">--}}
    {{--                            Эндокринолог--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </a>--}}
    {{--                <a href="#_5" class="main__docs_handler_item">--}}
    {{--                    <img src="img/doc1.jpg" alt="" class="main__docs_handler_ava">--}}
    {{--                    <div class="main__docs_handler_text">--}}
    {{--                        <div class="main__docs_handler_surname">--}}
    {{--                            Верещагина--}}
    {{--                        </div>--}}
    {{--                        <div class="main__docs_handler_name">--}}
    {{--                            Юлия Андреевна--}}
    {{--                        </div>--}}
    {{--                        <div class="main__docs_handler_spec">--}}
    {{--                            Педиатр--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </a>--}}
    {{--                <a href="#_6" class="main__docs_handler_item">--}}
    {{--                    <img src="img/doc1.jpg" alt="" class="main__docs_handler_ava">--}}
    {{--                    <div class="main__docs_handler_text">--}}
    {{--                        <div class="main__docs_handler_surname">--}}
    {{--                            Верещагина--}}
    {{--                        </div>--}}
    {{--                        <div class="main__docs_handler_name">--}}
    {{--                            Юлия Андреевна--}}
    {{--                        </div>--}}
    {{--                        <div class="main__docs_handler_spec">--}}
    {{--                            Педиатр--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </a>--}}
    {{--            </div>--}}
    {{--            <div class="main__docs_slider_right owl-carousel">--}}
    {{--                <div class="main__docs_info" data-hash="_1">--}}
    {{--                    <div class="main__docs_info_wrapper">--}}
    {{--                        <div class="main__docs_info_top">--}}
    {{--                            <div class="main__docs_photo main_doc1"></div>--}}
    {{--                            <div class="main__docs_content">--}}
    {{--                                <div class="main__docs_info_surname">--}}
    {{--                                    Верещагина--}}
    {{--                                </div>--}}
    {{--                                <div class="main__docs_info_name">--}}
    {{--                                    Юлия Андреевна--}}
    {{--                                </div>--}}
    {{--                                <div class="main__docs_info_spec">--}}
    {{--                                    Врач-педиатр.--}}
    {{--                                </div>--}}
    {{--                                <div class="main__docs_info_exp">--}}
    {{--                                    Стаж работы 25 лет--}}
    {{--                                </div>--}}
    {{--                                <div class="main__docs_info_title">--}}
    {{--                                    Информация о специалисте:--}}
    {{--                                </div>--}}
    {{--                                <div class="main__docs_info_line">--}}
    {{--                                    <div class="main__docs_info_line-green"></div>--}}
    {{--                                </div>--}}
    {{--                                <div class="main__docs_info_text">--}}
    {{--                                    Образование: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Tincidunt pulvinar interdum proin nisl urna dui, ut purus. Pulvinar facilisis adipiscing nibh arcu. Ultricies tellus--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <a href="#" class="main__docs_button button">--}}
    {{--                            Записаться на приём--}}
    {{--                        </a>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="main__docs_info" data-hash="_2">--}}
    {{--                    <div class="main__docs_info_wrapper">--}}
    {{--                        <div class="main__docs_info_top">--}}
    {{--                            <div class="main__docs_photo main_doc2"></div>--}}
    {{--                            <div class="main__docs_content">--}}
    {{--                                <div class="main__docs_info_surname">--}}
    {{--                                    Иванов--}}
    {{--                                </div>--}}
    {{--                                <div class="main__docs_info_name">--}}
    {{--                                    Василий Петрович--}}
    {{--                                </div>--}}
    {{--                                <div class="main__docs_info_spec">--}}
    {{--                                    Врач-педиатр.--}}
    {{--                                </div>--}}
    {{--                                <div class="main__docs_info_exp">--}}
    {{--                                    Стаж работы 25 лет--}}
    {{--                                </div>--}}
    {{--                                <div class="main__docs_info_title">--}}
    {{--                                    Информация о специалисте:--}}
    {{--                                </div>--}}
    {{--                                <div class="main__docs_info_line">--}}
    {{--                                    <div class="main__docs_info_line-green"></div>--}}
    {{--                                </div>--}}
    {{--                                <div class="main__docs_info_text">--}}
    {{--                                    Образование: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Tincidunt pulvinar interdum proin nisl urna dui, ut purus. Pulvinar facilisis adipiscing nibh arcu. Ultricies tellus--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <a href="#" class="main__docs_button button">--}}
    {{--                            Записаться на приём--}}
    {{--                        </a>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="main__docs_info" data-hash="_3">--}}
    {{--                    <div class="main__docs_info_wrapper">--}}
    {{--                        <div class="main__docs_info_top">--}}
    {{--                            <div class="main__docs_photo main_doc3"></div>--}}
    {{--                            <div class="main__docs_content">--}}
    {{--                                <div class="main__docs_info_surname">--}}
    {{--                                    Сидорова--}}
    {{--                                </div>--}}
    {{--                                <div class="main__docs_info_name">--}}
    {{--                                    Елена Петровна--}}
    {{--                                </div>--}}
    {{--                                <div class="main__docs_info_spec">--}}
    {{--                                    Врач-педиатр.--}}
    {{--                                </div>--}}
    {{--                                <div class="main__docs_info_exp">--}}
    {{--                                    Стаж работы 25 лет--}}
    {{--                                </div>--}}
    {{--                                <div class="main__docs_info_title">--}}
    {{--                                    Информация о специалисте:--}}
    {{--                                </div>--}}
    {{--                                <div class="main__docs_info_line">--}}
    {{--                                    <div class="main__docs_info_line-green"></div>--}}
    {{--                                </div>--}}
    {{--                                <div class="main__docs_info_text">--}}
    {{--                                    Образование: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Tincidunt pulvinar interdum proin nisl urna dui, ut purus. Pulvinar facilisis adipiscing nibh arcu. Ultricies tellus--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        --}}{{--<a href="#" class="main__docs_button button">--}}
    {{--                        --}}{{--    Записаться на приём--}}
    {{--                        --}}{{--</a>--}}
    {{--                    </div>--}}
    {{--                </div>--}}

    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <a href="specs.php" class="main__docs_mobile_button button">--}}
    {{--            Все специалисты--}}
    {{--        </a>--}}
    {{--    </div>--}}
    {{--</div>--}}
    <div class="main__mission">
        <div class="container">
            <div class="main__mission_wrapper">
                <div class="main__mission_img">
                    <img class="main__mission_rect" src="img/mission_rect.svg" alt="decorative element">
                    <div class="main__mission_slogan">
                        <div class="main__mission_slogan_title">
                            <div class="main__mission_title-line"></div>
                            <div class="main__mission_slogan_title-text">
                                Наша миссия
                            </div>
                        </div>
                        <div class="main__mission_slogan_text">
                            Ортомастер - территория здоровья, где каждый пациент получает индивидуальный комплексный подход и доступ к лучшим мировым медицинским технологиям
                        </div>
                    </div>
                </div>
                <div class="main__mission_content">
                    <h2 class="main__mission_title">
                        Сеть салонов Ортомастер

                    </h2>
                    <div class="main__mission_text">
                        "Ортомастер" — это сеть ортопедических салонов, которая предлагает вам только самые передовые технологии и инновационные решения в области ортопедии. Наша команда профессионалов обладает высокой экспертизой и стремится сделать вашу жизнь более комфортной и активной.
                    </div>
                    {{--<a href="#" class="main__mission_button button">--}}
                    {{--    Подробнее о салонах Ортомастер--}}
                    {{--</a>--}}
                </div>

            </div>
        </div>
    </div>
    <div class="main_contacts">
        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A264ae6a9a2aecb44bfca659f49946cec996a5b9bbd3d88d8af2189650b2ccc85&amp;width=100%25&amp;height=778&amp;lang=ru_RU&amp;scroll=false"></script>
        <div class="container">
            <div class="main_contacts_content">
                <h2 class="main_contacts_title">
                    Контакты
                </h2>
                <div class="contacts__data_time">
                    <div class="contacts__data_title">
                        Режим работы:
                    </div>
                    <div class="contacts__data_text"><em>Пн-Пт</em> 9:00-19:00<br><em>Сб, Вс</em> 10:00-18:00</div>
                </div>
                <div class="main_contacts_tel">
                    <div class="main_contacts_tel_title contacts__title">
                        Телефон:
                    </div>
                    <div class="main_contacts_tel_text">
                        <div class="main__tel_wrapper">
                            <a href="tel:+996509040200" class="main_contacts_tel_no main_tel1">
                                +996-509-04-02-00
                            </a>
                            {{--<a href="tel:+74012389110" class="main_contacts_tel_no main_tel3">--}}
                            {{--    +7 (4012) 38-91-10--}}
                            {{--</a>--}}
                        </div>
                        {{--<div class="main__tel_wrapper">--}}
                        {{--    <a href="tel:+79062389003" class="main_contacts_tel_no main_tel2">--}}
                        {{--        +7-906-238-90-03--}}
                        {{--    </a>--}}
                        {{--    <a href="tel:+79062389110" class="main_contacts_tel_no main_tel4">--}}
                        {{--        +7-906-238-91-10--}}
                        {{--    </a>--}}
                        {{--</div>--}}
                    </div>
                    <div class="main_contacts_adr">
                        <div class="main_contacts_adr_title contacts__title">
                            Адрес
                        </div>
                        <div class="main_contacts_adr_text">
                            г. Бишкек, ул. Байтик Баатыра, 19
                        </div>
                    </div>
                    <div class="main_contacts_mail">
                        <div class="main_contacts_mail_title contacts__title">
                            Email:
                        </div>
                        <a href="mailto:ortomaster.kg@gmail.com" class="main_contacts_mail_text">
                            ortomaster.kg@gmail.com
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main__registration">
        <div class="container">
            <div class="main__registration_wrapper">
                <div class="main__registration_inner">
                    <div class="registration-circle"></div>
                    <!-- <img src="img/steto.png" alt="stetoscope image" class="main__registration_steto"> -->
                    <div class="main__registration_content">

                        <div class="main__registration_title">
                            Записаться на приём
                        </div>
                        <div class="main__registration_text">
                            <div class="main__registration_text-top">
                                Оставьте свои данные и наш администратор свяжется с вами в ближайшее время
                            </div>
                            <div class="main__registration_text-bottom">
                                Либо звоните по телефону <em>+996-509-04-02-00</em>
                            </div>
                        </div>
                        <a href="#" class="main__docs_button button" data-hystmodal="#registerModal">
                            Записаться на приём
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection