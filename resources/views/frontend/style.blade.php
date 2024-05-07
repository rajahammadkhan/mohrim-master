<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");
    @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Cormorant:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap');

    html {
        overflow-x: hidden;
    }

    body {
        /*font-family: "Poppins", sans-serif;*/
        font-family: 'Nunito', sans-serif;

        background-color: #fff;
    }

    @media (min-width: 992px) {
        .col-lg-2half {
            flex: 0 0 auto;
            width: 20% !important;
        }
    }

    .MainHeading {
        font-family: 'Cormorant', serif;

    }

    .view-detail-cta {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 100%;
        left: 0;
        text-align: center;
        height: 70%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #toggle_filter {
        display: none;
    }

    .btn-price {
        background-color: #1fc1c3;
        color: #fff;
        border: none;
        transition: .3s;
    }

    .btn-price:hover {
        background-color: #1aa6a8;
        border: none;
        color: #fff;
    }

    .bd-soft {
        border: 1px solid #e8e8e8;
    }

    .bd-soft-right {
        border-right: 1px solid #e8e8e8;
    }

    .bd-soft-left {
        border-left: 1px solid #e8e8e8;
    }


    .categ-dropd {
        padding: 0px;
    }

    .categ-dropd li:hover {
        background-color: #1e90ff;
        color: white;
    }

    .coupon-cta {
        background: #1fc1c3;
        color: white;
        padding: 4px;
        text-transform: uppercase;
        font-size: 12px;
    }

    .coupon-cta:hover {
        background: #1fc1c3;
        color: white;
    }

    .wishlist.like-container {

    }

    .wishlist.like-container {
        height: 30px;
        width: 30px;
        display: flex;
        padding: 4px;
    }

    .orange-gradient {
        background: linear-gradient(0deg, #ff9c19 40%, #ffdd2d 110%);
        border: none;
        color: white;
        transition: all ease .3s;
        box-shadow: -3.828px -3.828px 6px 0px rgb(255 200 39 / 40%), 3px 5px 8px 0px rgb(255 82 1 / 20%);
    }

    .orange-gradient:hover {
        box-shadow: 11px 11px 32px rgb(255 82 1 / 20%), -11px -11px 32px rgb(255 200 39 / 40%);
        color: white;
    }

    /*::selection {*/
    /*    background: transparent;*/
    /*    color: #3b589d;*/
    /*}*/

    .read-more-cta {

        background-color: #38c4ca;
        color: white;
        font-weight: 600;
        border-radius: 3rem;

    }

    .read-more-cta:hover {

        background-color: #38c4ca;
        color: white;
        border: 1px solid #fff;

    }

    .header {
        /* position: fixed; */
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        background: rgb(255, 255, 255);
        transition: all 0.2s;
        display: flex;
        flex-direction: column;

        width: 100%;
    }


    .vd_controls {
        width: 100%;
    }

    .play {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }

    .play img {
        transition: 0.3s;
        opacity: 0;
    }

    a:hover {
        color: #3b589d;
    }

    .image-container {
        position: relative;
        height: 250px !important;
    }

    .image-container img {
        object-fit: cover;
        height: 100%;
        width: 100%;
    }

    .image-container .after {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        color: #fff;
        /*transform: translate(0%, -50%);*/
        align-items: end;
        transition: 0.3s;
        display: flex;
        align-items: flex-end;
        padding: 5px;
    }

    .card_pp .after {
        opacity: 1 !important;
        background: linear-gradient(
                0deg,
                rgba(28, 27, 27, 1) 6%,
                rgba(24, 23, 23, 1) 14%,
                rgba(21, 21, 21, 0.927608543417367) 21%,
                rgba(15, 15, 15, 0.7175245098039216) 36%,
                rgba(0, 0, 0, 0) 79%
        );
    }

    .card_pp:hover .play img {
        opacity: 1 !important;
        cursor: pointer;
    }

    .w-16 {
        width: 16px;
    }

    input:focus-visible {
        outline: 0;
    }
    #main_filter {
        display: flex;
    }

    @media screen and (max-width: 768px) {
        #main_filter {
            display: none;
        }

        #toggle_filter {
            display: block;
        }

        .bd-soft-right {
            border-right: 0px solid #e8e8e8;
        }

        .bd-soft-left {
            border-left: 0px solid #e8e8e8;
        }

        .second-row .bg-purp {
            font-size: 10px !important;
        }

        .logo img {
            width: 100%;
        }

        .top-links {
            display: none !important;
        }
    }

    .product-grid .Heading {
        font-size: 14px;
    }

    .parentDiv {
        color: rgb(0, 0, 0);
    }

    .desktop {
        /*background-image: url(https://eliteblue.net/Clients/viys/coupon/public/frontend/img/nav-bg.png);*/
        /*background-position: center;*/
        /*background-size: 102% 100%;*/
        /*background-repeat: no-repeat;*/
        /*background: #3b589d;*/
        height: 100%;
        width: 100%;
        /*padding: 10px 0%;*/
    }

    .desktop .logo {
        width: 20%;
    }

    .desktop .country-dropdown .dropdown-menu {
        transform: translate(22px, 30px) !important;
    }

    .sidebar.mob .country-dropdown .dropdown-menu {
        transform: translate(0) !important;
    }

    .sidebar.mob .country-dropdown .dropdown-menu img.w-40 {
        width: 10% !important;
    }

    .nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .parentDiv .nav ul {
        list-style: none;
        /* display: flex; */
        align-items: center;
    }

    .parentDiv .nav ul li a {
        margin-right: 21px;
        margin-left: 21px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 600;
        font-style: normal;
        color: #ffffff;
        transition: color 0.2s ease-in-out;
        letter-spacing: 0.2em;
        text-transform: uppercase;
    }

    .top-links a {
        text-decoration: none;
        font-size: 16px;
        font-weight: 600;
        font-style: normal;
        color: #ffffffcf;
        transition: color 0.2s ease-in-out;
        letter-spacing: 00em;
        text-transform: uppercase;
    }

    .mobile-nav {
        display: none !important;
    }

    @media screen and (max-width: 1000px) {
        .desktop .log {
            padding: 8px 14px !important;
        }

        .desktop .sign {
            padding: 8px 14px !important;
        }

        /*.search {*/
        /*    width: 60% !important;*/
        /*}*/
    }

    @media screen and (max-width: 768px) {
        .mobile-nav {
            display: flex !important;
            background-color: #38c4ca;
        }

        .logo {
            filter: invert(1);
        }

        .desktop {
            display: none;
        }
    }

    /*.search {*/
    /*    border-radius: 3rem;*/
    /*    background-color: white;*/
    /*}*/
    .search {
        border-radius: 5px;
        background-color: white;
        border: 1px solid #38c4ca !important;
    }

    .search input {
        font-weight: 600;
        border: none;
        border-left: 2px solid #ccc;
    }

    .search input:focus {
        outline: none;
    }

    .search input::placeholder {
        font-weight: 500;
        color: #bbb;
    }

    .search select {
        font-weight: 600;
        color: #000;
        border: 0;
        width: 41%;
    }

    .search-btn {
        background-color: white;
        border-left: 2px solid #ccc !important;
    }

    .desktop .log {
        color: white;
        font-weight: 500;
        border: 0;
    }

    .desktop .sign {
        font-weight: 600;
        background-color: #ffffff;
        border-radius: 3rem;
        color: #3b589d;
    }

    .desktop .sign:hover {
        background-color: #e6edff;
        color: #3b589d;
    }

    @media (max-width: 750px) {
        .search {
            padding: 8px 14px !important;
        }
    }

    @media (max-width: 500px) {
        .bi-search {
            width: 10px;
        }

        .search input {
            padding: 0 !important;
        }

        .search {
            justify-content: space-between !important;
        }
    }

    :root {
        --color-black: #1a1a1a;
        --color-darks: #404040;
        --color-greys: #999;
        --color-light: #f2f2f2;
        --color-white: #fff;
        --shadow-small: 0 1px 3px 0 rgba(0, 0, 0, 0.1),
        0 1px 2px 0 rgba(0, 0, 0, 0.06);
        --shadow-medium: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
        0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --shadow-large: 0 10px 15px -3px rgba(0, 0, 0, 0.1),
        0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }

    a {
        cursor: pointer;
        border: none;
        outline: none;
        background: none;
        text-transform: unset;
        text-decoration: none;
    }

    /*ul li {*/
    /*    list-style: none;*/
    /*}*/

    .section {
        margin: 0 auto;
        padding: 6rem 0 1rem;
    }

    .mob.container {
        max-width: 75rem;
        height: auto;
        margin: 0 auto;
        padding: 0 1.25rem;
    }

    .mob .brand {
        font-family: inherit;
        font-size: 1.5rem;
        font-weight: 600;
        line-height: 1.5;
        letter-spacing: -1px;
        text-transform: uppercase;
        color: #bbb;
    }

    .header.mobile {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: auto;
        z-index: 10;
        margin: 0 auto;
        background-color: var(--color-white);
        box-shadow: var(--shadow-medium);
    }

    .mob .brand img {
        width: 100%;
        filter: hue-rotate(309deg) brightness(136%);
    }

    .mob .brand {
        text-align: center;
    }

    .navbar.mob {
        position: relative;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        margin: 0 auto;
    }

    .menu.mobil {
        position: fixed;
        top: 0;
        left: -100%;
        width: 50%;
        height: 100%;
        z-index: 10;
        overflow-y: auto;
        background-color: var(--color-white);
        box-shadow: var(--shadow-medium);
        transition: all 0.5s ease-in-out;
    }

    .alert-dismissible button.close {
        position: absolute;
        top: 1%;
        right: 1%;
        background: transparent;
        border: 0;
        font-size: 30px;
    }

    /*User Start*/
    .custom-dropdown {
        top: 80%;
        left: unset;
    }

    .User-area, .custom-dropdown-area {
        width: auto;
        height: 100%;
        position: relative;
        cursor: pointer;
    }

    .custom-dropdown-area > .User-avtar > img {
        width: 45px;
        height: 45px;
        /*border-radius: 30px;*/
        /*filter: invert(1);*/
        /*border-radius: 30px;*/
        /*border: 1px solid #000;*/
        /*box-shadow: 0px 0px 12px -5px #000;*/
    }

    .UserProfile .custom-Dropdown {
        top: 60px;
        width: 100%;
    }

    .custom-Dropdown {
        display: none;
        position: absolute;
        border-radius: 7px;
        background: #fff;
        box-shadow: 0px 0px 8px rgba(59, 88, 157, .3);
        list-style: none !important;
        padding: 0 20px;
        width: auto;
        margin: 0;
        /*top: 35px;*/
        left: 0;
        z-index: 999999999;
    }

    .User-Dropdown > li,
    .custom-Dropdown > li {
        padding: 0px;
        line-height: 47px;
        border-bottom: 1px solid rgba(215, 215, 215, 0.17);
    }

    /*.User-Dropdown>li:last-child {*/
    /*    border-bottom: 0px;*/
    /*}*/
    .custom-dropdown-area .dropdown-toggle::after {
        color: #fff;
    }

    .country-list.dropdown-toggle::after {
        color: #fff;
    }

    .User-Dropdown > li a,
    .custom-Dropdown > li a {
        font-size: 13px !important;
        padding: unset !important;
        text-decoration: none !important;
        color: #000 !important;
        transition: all 0.2s ease-out !important;
        margin-right: unset !important;
        margin-left: unset !important;
        font-weight: unset !important;
        font-style: normal !important;
        letter-spacing: unset !important;
        text-transform: unset !important;
    }

    .User-Dropdown > li:before,
    .custom-Dropdown > li:before {
        content: '';
        width: 0px;
        height: 40px;
        position: absolute;
        background: #38c4ca;
        margin-top: 4px;
        border-radius: 0 1px 1px 0;
        left: 0px;
        transition: all 0.2s ease;
    }

    .User-Dropdown > li:hover:before,
    .custom-Dropdown > li:hover:before {
        width: 5px;
        border-radius: 30px;
    }

    .User-Dropdown > li a:hover,
    .custom-Dropdown > li a:hover {
        margin-left: 5px;
    }

    nav.mob ul .user-show.show3 {
        display: block;
    }

    /*User End*/


    .menu.mobil.is-active {
        top: 0;
        left: 0;
    }

    .menu.mobil.is-active .menu-inner {
        padding: 20% 0;
    }

    .menu-inner {
        display: flex;
        flex-direction: column;
        row-gap: 1.25rem;
        margin: 1.25rem;
        align-items: center;
    }

    .menu-link {
        font-family: inherit;
        font-size: 12px;
        font-weight: 700;
        padding: 6px 12px;
        line-height: 1.5;
        transition: all 0.3s ease;
        text-transform: uppercase;
    }

    .menu-link:hover {
        color: #bbb;
    }

    @media only screen and (min-width: 48rem) {
        .menu.mobil {
            position: relative;
            top: 0;
            left: 0;
            width: auto;
            height: auto;
            margin-left: auto;
            background: none;
            box-shadow: none;
        }

        .menu-inner {
            display: flex;
            flex-direction: row;
            column-gap: 1.75rem;
            margin: 0 auto;
            margin-right: 5rem;
            align-items: center;
        }

        .menu-block {
            margin-left: 2rem;
        }
    }

    .burger {
        position: relative;
        display: block;
        cursor: pointer;
        order: -1;
        width: 1.75rem;
        height: auto;
        border: none;
        outline: none;
        visibility: visible;
    }

    .burger-line {
        display: block;
        cursor: pointer;
        width: 100%;
        height: 2px;
        margin: 6px auto;
        transform: rotate(0deg);
        background-color: #fff;
        transition: all 0.3s ease-in-out;
    }

    .menu.mobil a {
        color: white;
        font-size: 12px;
    }

    /* @media only screen and (min-width: 48rem) {
      .burger {
        display: none;
        visibility: hidden;
      }
    } */

    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9;
        opacity: 0;
        visibility: hidden;
        background-color: rgba(0, 0, 0, 0.6);
        transition: all 0.3s ease-in-out;
    }

    .overlay.is-active {
        display: block;
        opacity: 1;
        visibility: visible;
    }

    .search-toggle,
    .search-cancel {
        display: block;
        cursor: pointer;
        font-size: 1.35rem;
        line-height: inherit;
        color: #fff;
    }

    .search-cancel::before {
        color: #3b589d;
    }

    .search-block {
        position: fixed;
        top: 0;
        right: -100%;
        width: 100%;
        height: 100%;
        z-index: 10;
        overflow: hidden;
        background-color: #fff;
        transition: all 0.45s ease-in-out;
    }

    .search-block.is-active {
        top: 0;
        right: 0;
    }

    .search-form {
        display: flex;
        align-items: center;
        column-gap: 0.75rem;
        padding: 0.75rem 1rem;
    }

    .search-input {
        display: block;
        font-family: inherit;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        width: 100%;
        height: auto;
        padding: 0.65rem 1.25rem;
        border: none;
        outline: none;
        border-radius: 0.25rem;
        color: #fff;
        background-color: #eee;
    }

    .search-input::-webkit-search-decoration,
    .search-input::-webkit-search-cancel-button {
        display: none;
        visibility: hidden;
    }

    .menu.mobil.is-active a {
        color: #3b589d;
    }

    .mobile-nav .log {
        color: #3b589d;
        font-weight: 700;
    }

    .menu.mobil.is-active .sign {
        background-color: #3b589d;
        color: #ffffff !important;
        border-radius: 3rem;
        font-weight: 700;
    }

    .mobile-nav .sign {
        font-weight: 700;
        background-color: #ffffff;
        color: #3b589d !important;
        border-radius: 3rem;
    }

    /*.top-links select {*/
    /*    border: 0px !important;*/
    /*    text-decoration: none;*/
    /*    font-size: 18px;*/
    /*    font-weight: 600;*/
    /*    font-style: normal;*/
    /*    color: #000;*/
    /*    transition: color 0.2s ease-in-out;*/
    /*    letter-spacing: 00em;*/
    /*    text-transform: uppercase;*/
    /*}*/

    @media (max-width: 768px) {
        .mobile-nav .country-list.dropdown-toggle {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .mobile-nav .custom-Dropdown {
            line-height: 45px !important;
        }

        nav.mob ul.custom-Dropdown {
            width: unset !important;
            height: unset !important;

        }

        .top-links select,
        .top-links a {
            text-decoration: none;
            font-size: 14px;
            font-weight: 800;
            font-style: normal;
            color: #ffffffde;
            transition: color 0.2s ease-in-out;
            letter-spacing: 00em;
            text-transform: uppercase;
        }

        .contact-img {
            display: none;
        }
    }

    @media (max-width: 480px) {
        .top-links select,
        .top-links a {
            border: 0px !important;
            text-decoration: none;
            font-size: 14px;
            font-weight: 800;
            font-style: normal;
            color: #ffffffde;
            transition: color 0.2s ease-in-out;
            letter-spacing: 00em;
            text-transform: uppercase;
        }

        .social_profile ul li a {
            width: 40px;
            height: 40px;
            line-height: 40px;
        }

        /*.contact_main .form {*/
        /*    padding: 20px 8px !important;*/
        /*    margin: 4px !important;*/
        /*}*/
    }

    .carousel-control-next,
    .carousel-control-prev {
        width: 10%;
    }

    .carousel-control-next-icon,
    .carousel-control-prev-icon {
        width: 3rem;
        height: 3rem;
        /* padding: 0rem; */
        background-size: 100%;
        opacity: 0.7;
    }

    .carousel-control-next-icon:hover,
    .carousel-control-prev-icon:hover {
        opacity: 1;
    }

    .carousel-control-prev-icon {
        background-image: url(https://eliteblue.net/Clients/viys/coupon/public/frontend/img/left-arrow.png);
    }

    .carousel-control-next-icon {
        background-image: url(https://eliteblue.net/Clients/viys/coupon/public/frontend/img/right-arrow.png);
    }

    .text-purp {
        color: #38c4ca;
    }

    .bg-purp {
        background-color: #3b589d;
    }

    .bg-signature {
        background-color: #38c4ca !important;
    }

    .text-signature {
        color: #38c4ca;
    }

    .expiry,
    .old_price {
        font-size: 12px;
    }

    .like-button {
    }

    .like-button svg {
        opacity: 1;
    }

    .like-button svg path {
        fill: #333;
        transition: fill 0s ease-out;
    }

    .like-button.active svg path {
        fill: #2196f3;
    }

    .wishlist {
        /*position: absolute;*/
        /*top: 3%;*/
        /*right: 3%;*/
        /*height: 40px;*/
        /*width: 40px;*/
    }

    #heart {
        color: grey;
    }

    #heart.red {
        color: #3b589d;
    }

    .product-item {
        transition: 0.1s;
        transition: 0.5s ease-in;
        cursor: pointer;
        overflow: hidden;
        /*border: 0.35rem solid transparent;*/
    }

    /*.product-item:hover {*/
    /*    box-shadow: 0 0 15px 3px #bbb !important;*/
    /*    border: 0.35rem solid #3b589d;*/
    /*}*/

    /*.product-item:hover:after {*/
    /*    content: "";*/
    /*    position: absolute;*/
    /*    top: -2px;*/
    /*    left: -2px;*/
    /*    border: 18px solid transparent;*/
    /*    border-left: 18px solid #3b589d !important;*/
    /*    border-bottom: 18px solid #3b589d !important;*/
    /*    transform: rotate(90deg);*/
    /*}*/

    .main.pd_cards {
        position: relative;
        transition: 0.1s;
        cursor: pointer;
    }

    .pd_card_overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .main.pd_cards:hover .pd_card_overlay {
        box-shadow: 0 0 15px 3px #bbb !important;
        border: 0.35rem solid #3b589d;
    }

    .main.pd_cards img {
        z-index: 0;
    }

    .main.pd_cards:hover .pd_card_overlay:after {
        content: "";
        z-index: 5;
        position: absolute;
        top: -2px;
        left: -2px;
        border: 18px solid transparent;
        border-left: 18px solid #3b589d !important;
        border-bottom: 18px solid #3b589d !important;
        transform: rotate(90deg);
    }

    .shadow {
        box-shadow: 0 0 15px #ccc !important;
    }

    .shadow_dark {
        box-shadow: 0 0 15px #5e5e5e !important;
    }

    .top-cards {
        transition: border-radius 0.3s;
        cursor: pointer;
        position: relative;
    }

    .top-cards:hover {
        box-shadow: 0 0 15px 3px #bbb !important;
        border: 0.2rem solid #3b589d;
    }

    .top-cards {
        transition: 0.15s;
    }

    .top-cards:hover:after {
        content: "";
        position: absolute;
        top: -1px;
        left: -1px;
        /* background-color: #3b589d; */
        /* width: 8px; */
        /* height: 20px; */
        /* width: 24px; */
        /* height: 0; */
        border: 12px solid transparent;
        border-left: 12px solid #3b589d !important;
        border-bottom: 12px solid #3b589d !important;
        transform: rotate(90deg);
    }

    .full-w .wishlist {
        top: 0;
        right: 15%;
    }

    .side-text {
        font-size: 10px;
    }

    .custom_btn {
        background-color: #3b589d;
        padding: 0.75rem 2rem;
        font-size: 20px;
        border: none;
        border-radius: 3rem;
        font-weight: 500;
        color: white;
        transition: 0.3s;
    }

    .custom_btn:hover {
        background-color: #6483cb;
        color: white;
    }

    .footer ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .footer img {
        max-width: 100%;
        height: auto;
    }

    .footer section {
        padding: 60px 0;
        /* min-height: 100vh;*/
    }

    .footer {
        /*background: #3b589d;*/
        background: #38c4ca !important;
        /*padding-bottom: 40px;*/
    }

    .footer .row.main_footer {
        padding-top: 14px;
    }

    /*END FOOTER SOCIAL DESIGN*/
    .single_footer {
    }

    .code {
        display: block;
        width: 100%;
        text-align: right;
        background: #e6eeffe6;
        padding: 10px 10px 10px 60px;
        font-weight: bold;
        color: #000000;
    }

    .peel-btn {
        position: absolute;
        top: 50%;
        left: 0;
        width: calc(100% - 50px);
        cursor: pointer;
        background: #6483cb;
        color: #fff;
        padding: 8px;
        display: flex;
        justify-content: center;
        transition: all 0.3s linear;
        transform: translate(0, -50%);
    }

    .peel-btn:hover,
    .peel-btn:focus {
        background: #48629f;
        transition: all 0.3s linear;
        color: #fff;
    }

    .peel-btn:hover:after {
        border-bottom: 36px solid #1c2f5b;
        border-right: 30px solid transparent;
        right: -28px;
        transition: all 0.3s linear;
    }

    .peel-btn:hover:before {
        width: 28px;
        height: 8px;
        background: #48629f;
        transition: all 0.3s linear;
    }

    .peel-btn:before {
        content: "";
        position: absolute;
        bottom: 0;
        left: 100%;
        width: 28px;
        height: 15px;
        background: #6483cb;
        transition: all 0.3s linear;
    }

    /* @media (min-width: 768px) {
      .container,
      .container-md,
      .container-sm {
        max-width: 800px;
      }
    } */

    .peel-btn:after {
        content: "";
        position: absolute;
        top: 0;
        right: -28px;
        border-bottom: 28px solid #1c2f5b;
        border-right: 28px solid transparent;
        transition: all 0.3s linear;
    }

    .coupons .coupon1 {
        margin: 35px auto;
        background: white;
        box-shadow: 0 2px 4px 2px rgba(0, 0, 0, 0.1);
        padding: 15px;
    }

    .coupons .coupon1 .get-codebtn-holder {
        float: left;
        text-align: center;
        width: 30%;
    }

    html,
    body {
        overflow-x: hidden;
    }

    @media only screen and (max-width: 1200px) {
        .peel-btn {
            font-size: 8px;
        }

        .code {
            font-size: 10px;
        }

        .peel-btn:after {
            right: -20px;
            border-bottom: 20px solid #1c2f5b;
            border-right: 20px solid transparent;
        }

        .peel-btn:before {
            width: 20px !important;
        }

        .peel-btn:hover:after {
            border-bottom: 23px solid #1c2f5b;
            border-right: 20px solid transparent;
            right: -20px;
            transition: all 0.3s linear;
        }
    }

    @media only screen and (max-width: 768px) {
        .single_footer {
            margin-bottom: 30px;
        }

        .peel-btn {
            position: absolute;
            top: 50%;
            left: 6%;
            left: 5%;
            width: calc(100% - 80px);
            cursor: pointer;
            background: #6483cb;
            color: #fff;
            padding: 8px;
            display: flex;
            justify-content: center;
            transition: all 0.3s linear;
            transform: translate(0, -50%);
        }
    }

    .single_footer h4 {
        color: #fff;
        margin-top: 0;
        margin-bottom: 10px;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 18px;
    }

    .single_footer p {
        color: #fff;
    }

    .single_footer ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .single_footer ul li {
    }

    .single_footer ul li a {
        color: #fff;
        -webkit-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
        line-height: 30px;
        font-size: 14px;
        font-weight: normal;
        text-transform: capitalize;
    }

    .single_footer ul li a:hover {
        opacity: 0.8;
    }

    .single_footer_address {
    }

    .single_footer_address ul {
    }

    .single_footer_address ul li {
        color: #fff;
    }

    .single_footer_address ul li span {
        font-weight: 400;
        color: #fff;
        line-height: 28px;
    }

    .contact_social ul {
        list-style: outside none none;
        margin: 0;
        padding: 0;
    }

    /*START NEWSLETTER CSS*/
    .subscribe {
        display: block;
        position: relative;
        margin-top: 15px;
        /*width: 100%;*/
    }

    .subscribe__input {
        background-color: #fff;
        border: medium none;
        border-radius: 5rem;
        color: #333;
        display: block;
        font-size: 15px;
        font-weight: 500;
        height: 45px;
        letter-spacing: 0.4px;
        margin: 0;
        padding: 0 65px 0 15px;
        text-align: start;
        text-transform: capitalize;
        width: 100%;
    }

    .subscribe__input:focus {
        border: none !important;
        border: 0px !important;
    }

    @media only screen and (max-width: 768px) {
        .subscribe__input {
            padding: 0 50px 0 20px;
        }
    }

    .subscribe__btn {
        background-color: transparent;
        border-radius: 0 25px 25px 0;
        color: #38c4ca;
        cursor: pointer;
        display: block;
        font-size: 20px;
        height: 45px;
        position: absolute;
        right: 0;
        top: 0;
        width: 60px;
    }

    .subscribe__btn i {
        transition: all 0.3s ease 0s;
        color: #38c4ca;
    }

    @media only screen and (max-width: 768px) {
        .subscribe__btn {
            right: 0px;
        }
    }

    .subscribe__btn:hover i {
        opacity: 0.8;
    }

    .footer button {
        padding: 0;
        border: none;
        background-color: transparent;
        -webkit-border-radius: 0;
        border-radius: 0;
    }

    /*END NEWSLETTER CSS*/

    /*START SOCIAL PROFILE CSS*/
    .social_profile {
        margin-top: 18px;
    }

    .social_profile ul {
        list-style: outside none none;
        margin: 0;
        padding: 0;
    }

    .social_profile ul li {
        float: left;
    }

    .social_profile ul li a {
        text-align: center;
        border: 0px;
        text-transform: uppercase;
        transition: all 0.3s ease 0s;
        margin: 0px 5px;
        font-size: 18px;
        color: #fff;
        border-radius: 30px;
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    @media only screen and (max-width: 768px) {
        .social_profile ul li a {
            margin-right: 10px;
            margin-bottom: 10px;
        }
    }

    .social_profile ul li a:hover {
        /*background: #6483cb;*/
        border: 1px solid #6483cb;
        color: #fff;
        border: 0px;
        opacity: 0.9;
    }

    .blog_sec_1 {
        /*background-image: url(https://eliteblue.net/Clients/viys/coupon/public/frontend/img/blog.jpg);*/
        background-color: #38c4ca;
        background-position: 0 100%;
        background-size: cover;
        background-repeat: no-repeat;
        height: 100%;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 2%;
    }

    .blog_sec_1 button, .signup_btn {
        background-color: #38c4ca;
        color: white;
        border: 0px;
        border-radius: 0px;
    }

    .blog_sec_1 button:hover, .signup_btn:hover, .login_btn:hover {
        background-color: #41e8ef;
        color: white;
    }

    .blog_sec_1 .form {
        border: 1px solid white;
        overflow: hidden;
        border-radius: 3rem;
    }

    @media (max-width: 992px) {
        .blog_sec_1 .form {
            border: 0px solid white;
            overflow: visible;
            margin: 2rem 0;
        }

        .blog_sec_1 input {
            border-radius: 3rem !important;
        }

        .blog_sec_1 button {
            border-radius: 3rem;
            margin: 1rem 0;
            padding: 0rem 0;
            background-color: white;
            color: #38c4ca;
        }
    }


    header .dropdown-menu a {
        display: inline;
    }

    header .dropdown-menu li {
        margin: 1rem 0 !important;
    }

    header .dropdown-menu li:hover a {
        background-color: #3b589d18 !important;
        padding: 1rem;
    }

    header .dropdown-menu li a {
        margin: 1rem 0 !important;
        text-decoration: unset !important;
        font-size: unset !important;
        font-weight: unset !important;
    }

    header .dropdown-menu.show {
        min-width: 100% !important;
        border: none;
        text-align: center;
        background: #3b589d1f !important;
        height: 50vh;
        overflow-y: scroll;
    }

    .w-40 {
        width: 40% !important;
    }

    .card-btn1 {
        font-size: 16px;
        border: 2px dashed #3b589d;
        font-weight: 600;
    }

    .card-btn2 {
        border: 2px solid #3b589d;
        font-weight: 400;
        font-size: 12px;
    }

    .text-muted {
        color: #777 !important;
    }

    @media only screen and (max-width: 992px) {
        .card-btn1 {
            font-size: 8px;
            border: 2px dashed #3b589d;
        }

        .card-btn2 {
            font-size: 8px;
        }

        .truncate {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    }

    @media only screen and (max-width: 768px) {
        .truncate {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .peel-btn {
            position: absolute;
            top: 50%;
            left: 6%;
            left: 5%;
            width: calc(100% - 46px);
            cursor: pointer;
            background: #6483cb;
            color: #fff;
            /* padding: 8px; */
            display: flex;
            justify-content: center;
            transition: all 0.3s linear;
            transform: translate(0, -50%);
        }

        .com_card {
            padding: 7px !important;
        }

        .fs-10 {
            font-size: 10px;
        }

        .fs-8 {
            font-size: 8px;
        }
    }

    .fs-12 {
        font-size: 12px !important;
    }

    .truncate {
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    @media only screen and (max-width: 530px) {
        .truncate {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .peel-btn {
            position: absolute;
            top: 50%;
            left: 6%;
            left: 5%;
            width: calc(100% - 46px);
            cursor: pointer;
            background: #6483cb;
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: center;
            transition: all 0.3s linear;
            transform: translate(0, -50%);
            font-size: 8px;
        }

        .code {
            font-size: 8px;
        }
    }

    @media only screen and (max-width: 500px) {
        .truncate {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .peel-btn {
            position: absolute;
            top: 50%;
            left: 6%;
            left: 5%;
            width: calc(100% - 46px);
            cursor: pointer;
            background: #6483cb;
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: center;
            transition: all 0.3s linear;
            transform: translate(0, -50%);
            font-size: 5px;
        }

        .code {
            font-size: 5px;
        }

        .peel-btn:before {
            content: "";
            position: absolute;
            bottom: 0;
            left: 100%;
            width: 28px;
            height: 8px;
            background: #6483cb;
            transition: all 0.3s linear;
        }
    }

    @media only screen and (max-width: 400px) {
        .peel-btn {
            position: absolute;
            top: 50%;
            left: 6%;
            left: -17%;
            width: calc(100% - 20px);
            cursor: pointer;
            background: #6483cb;
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: center;
            transition: all 0.3s linear;
            transform: translate(0, -50%);
            font-size: 5px;
        }

        .code {
            font-size: 5px;
        }

        .peel-btn:before {
            content: "";
            position: absolute;
            bottom: 0;
            left: 100%;
            width: 28px;
            height: 8px;
            background: #6483cb;
            transition: all 0.3s linear;
        }
    }

    .fw-sm-bold {
        font-weight: 600;
    }

    .options {
        display: none !important;
        position: absolute;
        top: 100%;
        right: 0;
        left: 0;
        z-index: 999;
        margin: 0 0;
        padding: 0 0;
        list-style: none;
        border: 1px solid #ccc;
        background-color: white;
    }

    .options_active {
        display: block !important;
    }

    .options li {
        width: 100%;
        padding: 14px 6px !important;
    }

    .options li a {
        width: 100%;
        color: #3b589d !important;
        margin-right: unset !important;
        margin-left: unset !important;
        font-size: 13px !important;
        display: block !important;
        color: #3b589d !important;
        /*padding: 11px 8px!important;*/
        font-size: 16px !important;
        font-weight: 600 !important;
        letter-spacing: 0em !important;
        transition: .3s !important;
        text-transform: capitalize !important;

    }

    .styledSelect.active:after {
        content: "";
        width: 0;
        height: 0;
        border: 5px solid transparent;
        border-color: #3b589d transparent transparent transparent;
        position: absolute;
        top: 6px;
        right: 6px;
        transform: scaleY(-1);
    }

    .options li:hover {
        background-color: #3b589d !important;
        color: white !important;
    }

    .options li:hover a {
        color: white !important;
    }

    .select {
        cursor: pointer;
        /*display: inline-block;*/
        position: relative;
        color: #3b589d;
        font-weight: 600;
        font-size: 18px;
        width: 135px;
    }

    .styledSelect {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }

    .styledSelect:after {
        content: "";
        width: 0;
        height: 0;
        border: 5px solid transparent;
        border-color: #3b589d transparent transparent transparent;
        position: absolute;
        top: 12px;
        right: 6px;
        transform: scaleY(1);
        transition: .2s;
    }

    .s-hidden {
        visibility: hidden;
        padding-right: 10px;
    }


    .drops button {
        background-color: transparent;
        color: #3b589d;
        font-weight: 600;
        border: 0px !important;
        box-shadow: none !important;
        font-size: 18px;
        text-transform: uppercase;
    }

    .drops ul li a:focus {
        background-color: #3b589d;
        color: white;
    }

    .drops button:focus {
        background-color: transparent;
        color: #3b589d;
        font-weight: 600;
        border: 0px !important;
        box-shadow: none !important;
    }

    .drops button:hover {
        background-color: transparent;
        color: #3b589d;
        font-weight: 600;
        border: 0px !important;
    }

    .togle {


    }

    .togle.click {
        left: 85%;
        z-index: 100;
        position: fixed;
        top: 35px;
    }

    .list {
        overflow-y: auto;
    }

    .togle.click .burger-line:nth-child(1) {
        display: none;
    }

    .togle.click .burger-line:nth-child(2) {
        transform: rotate(45deg);
    }

    .togle.click .burger-line:nth-child(3) {
        transform: rotate(-45deg) translate(5px, -5px);
    }

    .close_btn {
        display: none;
    }

    .close_btn i {
        color: white;
        width: 45px;
        height: 45px;
    }

    .togle span {
        color: white;
        font-size: 28px;
        line-height: 45px;
    }

    .sidebar {
        position: fixed;
        width: 0%;
        height: 100%;
        left: -100%;
        background: #fff;
        transition: all 0.4s ease;
        z-index: 99;
        top: 0;
    }

    .sidebar.show {
        left: 0%;
        width: 80%;
        transition: all 0.4s ease;
    }

    .sidebar.show:first-of-type .togle.burger {
        display: none;
    }

    .sidebar.show ~ .close_btn {
        display: block;
    }

    nav.mob ul {
        background: transparent;
        height: 100%;
        width: 100%;
        list-style: none;
    }

    nav.mob ul li {
        line-height: 60px;
        border-top: 1px solid #3b9c9d34;
    }

    nav.mob ul li a {
        position: relative;
        color: #212121;
        text-decoration: none;
        font-size: 16px;
        padding-left: 25px;
        font-weight: 400;
        display: block;
        width: 100%;
        border-left: 3px solid transparent;
    }

    nav.mob ul li.active a {
        color: #212121;
        border-left-color: #212121;
    }

    nav.mob ul li a:hover {
        background: #3b589d18;
    }

    nav.mob ul ul {
        position: static;
        display: none;
    }

    nav.mob ul .feat-show.show {
        display: block;
    }

    nav.mob ul .serv-show.show1 {
        display: block;
    }

    nav.mob ul .categ-show.show4 {
        display: block;
    }

    .mobile-nav .sidebar .list li ul {
        height: unset !important;

    }

    nav.mob ul .comm-show.show2 {
        display: block;
    }

    nav.mob ul ul li {
        line-height: 42px;
        border-top: none;
    }

    nav.mob ul ul li a {
        font-size: 17px;
        color: #505050;
        padding-left: 55px;
        text-align: left !important;
    }

    nav.mob ul li.active ul li a {
        color: #38c4caba;
        border-left-color: transparent;
    }

    nav.mob ul ul li a:hover {
        /* background: #3b589d18 !important; */
    }

    nav.mob ul li a span {
        position: absolute;
        top: 50%;
        right: 20px;
        transform: translateY(-50%);
        font-size: 22px;
        transition: transform 0.4s;
    }

    nav.mob ul li a span.rotate {
        transform: translateY(-50%) rotate(-180deg);
    }

    nav.mob.sidebar ul {
        padding: 0;
    }

    .navbar.mob .dropdown-toggle::after {
        display: none;
    }

    .dropdown-toggle .feat-btn {
        width: 100%;
    }

    .sidebar.show .main-flag {
        width: 60px;
    }

    .sidebar.show .dropdown-menu.feat-show.show img {
        width: 10% !important;
        padding-top: 0px !important;
        padding-bottom: 0px !important;
    }

    .sidebar.show .dropdown-menu.feat-show.show li:hover a {
        padding-left: 55px;
        padding-top: 0px !important;
        padding-bottom: 0px !important;
    }

    .sidebar.show .dropdown-menu.feat-show.show li a {
        margin: 0px !important;
        padding-top: 0px !important;
        padding-bottom: 0px !important;
    }

    .sidebar.show .dropdown-menu.feat-show.show li {
        text-align: start;
        margin: 0px !important;
    }

    .w-80 {
        width: 80%;
    }

    .search input {
        width: 100%;
    }

    .desktop .right .search .fields {
        display: flex;
        /* width: 75%; */
    }

    .mobile-nav .search .fields {
        display: flex;
    }

    .mobile-nav .search .fields select {
        font-size: 10px;
    }

    .mobile-nav .search .fields input[name="coupon"] {
        font-size: 12px;
    }

    @media (max-width: 1050px) {
        .searchmob {
            margin: 0 !important;
            width: 100% !important;
            border-radius: 3rem;
            border: 2px solid #3b589d;
            padding: 12px 24px !important;
        }

        .searchmob input {
            color: #3b589d;
            width: 100%;
        }

        .categ_links {
            margin: 0 !important;
            /* width: 100% !important; */
            border-radius: 3rem;
            border: 2px solid #3b579c;
            margin: 12px 24px !important;
            overflow: hidden;
        }

        .searchmob input::placeholder {
            font-weight: 500;
            color: #3b589d64;
        }

        .searchmob .search-btn {
            padding: 0 0rem 0 1rem;
        }

        .cate {
            line-height: 53px !important;
        }

        .searchmob .bi-search {
            width: 18px;
        }

        .lh {
            line-height: 23px !important;
            padding: 8px 0;
            background-color: #38c4ca;
        }

        .searchmob input {
            font-weight: 600;
            border: none;
            border-left: 0px solid #ccc;
        }
    }

    .w-30px {
        width: 30px !important;
    }

    .sliderx .slick-arrow.slick-prev {
        left: 0;
        background: url(https://eliteblue.net/Clients/viys/coupon/public/frontend/img/angle-left.png) 0 0 / 100% no-repeat;
        border: none;
        /* filter: invert(1); */
        transition: 0.3s;
    }

    .cate .categ_links select {
        -webkit-appearance: none;
        -moz-appearance: none;
        background: transparent;
        background-image: url("data:image/svg+xml;utf8,<svg fill='black' height='35' viewBox='0 0 24 24' width='30' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/><path d='M0 0h24v24H0z' fill='none'/></svg>");
        background-repeat: no-repeat;
        background-position: 95% center;
        border-radius: 2px;
    }

    .cate .categ_links select {
        outline: none !important;
        border: 0;
        color: #3b589d;
        font-size: 18px;
        font-weight: 500;
    }

    .cate .categ_links select:focus {
        border: 0;
    }

    /* .sliderx .slick-arrow.slick-prev::before {
    content: "\f105";
    width: 20px;
    height: 20px;
    } */
    .sliderx .slick-arrow {
        position: absolute;
        top: 50%;
        margin: -20px 0px 0px 0px;
        z-index: 10;
        font-size: 0;
        width: 30px;
        height: 30px;
    }

    .sliderx .slick-arrow.slick-next {
        right: 0;
        border: none;
        background: url(https://eliteblue.net/Clients/viys/coupon/public/frontend/img/angle-right.png) 0 0 / 100% no-repeat;
        transition: 0.3s;
        /* filter: invert(1); */
    }

    .sliderx .slick-arrow.slick-next:hover {
        background: url(https://eliteblue.net/Clients/viys/coupon/public/frontend/img/angle-right-hovr.png) 0 0 / 100% no-repeat;
        background-color: #3b589d;
    }

    .sliderx .slick-arrow.slick-prev:hover {
        background: url(https://eliteblue.net/Clients/viys/coupon/public/frontend/img/angle-left-hovr.png) 0 0 / 100% no-repeat;
        background-color: #3b589d;
    }

    .sliderx .slick-arrow {
        position: absolute;
        top: 50%;
        margin: -20px 0px 0px 0px;
        z-index: 10;
        font-size: 0;
        width: 35px;
        height: 35px;
        border-radius: 50%;
    }

    .foot_sliderz .slick-prev.slick-arrow,
    .foot_sliderz .slick-next.slick-arrow {
        display: none !important;
    }

    .comment_box {
        width: 100%;
        height: 185px;
    }

    .comment_box .comment input,
    .comment_box .file input {
        width: 100%;
        height: 100%;
    }

    .file-upload-content {
        display: none;
        text-align: center;
    }

    .file-upload-input {
        position: absolute;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        outline: none;
        opacity: 0;
        cursor: pointer;
    }

    .image-upload-wrap {
        background-color: #efefef;
        position: relative;
        height: 100%;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: 0.3s;
    }

    .drag-text i {
        font-size: 3rem;
        opacity: 0.75;
    }

    .image-dropping,
    .image-upload-wrap:hover {
        background-color: #dfdfdf;
    }

    .image-title-wrap {
        padding: 0 15px 15px 15px;
        color: #222;
    }

    .file-upload-image {
        margin: auto;
        padding: 20px 0;
        height: 170px;
        object-fit: contain;

    }

    @media (max-width: 768px) {
        .comment_box {
            flex-direction: column-reverse;
            height: 100% !important;
        }

        .comment_box .image-upload-wrap {
            height: 100px;
        }

        .comment_box .file {
            padding-right: 0.75rem !important;
        }
    }

    .slick-slide img {
        display: block !important;
    }

    .fancybox-content {
        text-align: center !important;
    }

    .sliderx.slider-products .slick-slide {
        height: 350px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .sliderx.slider-products .slick-slide div,  .sliderx.slider-products .slick-slide img{
        height: 100% !important;
    }
    .foot_sliderz .slick-slide img {
        height: 125px;
        display: flex;
        align-items: center;
        object-fit: contain;
    }


    /*.left-content .img img {*/
    /*    width: 65px;*/
    /*}*/

    /*@media (max-width: 768px) {*/

    /*    .container.login-container {*/
    /*        max-width: 860px;*/
    /*    }*/
    /*}*/

    .pd-img {
        height: 182px;
    }

    .pd-img img {
        width: 100% !important;
        height: 100%;
        object-fit: contain;
    }


    /*Blog Section Page*/
    .blog-list-view {
        position: relative;
    }

    .blog-list-view .content {
        position: absolute;
        top: 50%;
        width: 60%;
        transform: translate(0, -50%);
        right: 0;
    }

    .blog-list-view .para {
        word-break: break-word;
    }

    .blog-grid-view .para {
        word-break: break-word;
    }

    .blog-grid-view img {
        /*height: 300px;*/
        object-fit: cover;
    }

    .scroll-active {
        position: fixed;
    }

    @media (min-width: 1200px) {
        .container, .container-lg, .container-md, .container-sm, .container-xl {
            max-width: 95% !important;
        }
    }

    .dropdown.drops:hover .dropdown-menu {
        /*display: block;*/
        /*margin-top: 0;*/
        border-radius: 0px;
        border-color: #ccc;
    }

    .dropdown.drops .dropdown-menu {
        padding: 0;
        border-radius: 0px;
    }

    .dropdown.drops .dropdown-item {
        color: #3b589d;
        padding: 11px 8px;
        font-size: 16px;
        font-weight: 600;
        /* letter-spacing: 0.2em; */
        transition: .3s;
    }

    .dropdown.drops .dropdown-item:hover {
        color: #fff;
        background: #3b589d;
    }

    .btn.show {
        color: #3b589d;
    }

    .copyright-tag {
        text-transform: uppercase;

    }

    .copyright-tag h6 {
        font-size: 14px;
    }

    .copyright-tag h6 a {
        color: white !important;
        text-decoration: none;
        font-size: unset;
        font-weight: unset;
        font-style: normal;
        letter-spacing: unset;
    }

    .copyright-tag h6 a:hover {
        color: #bbb !important;
    }

    .side-nav-buttons .sign {
        background: #3b589d;
        color: #fff !important;
        transition: .3s;
    }

    .side-nav-buttons .sign:hover {
        background: rgba(59, 88, 157, 0.79);
    }

    .side-nav-buttons .log {
        transition: .3s;
    }


    .overlay-pd {
        height: 100%;
        width: 100%;
        background: rgba(0, 179, 190, .59) !important;
        top: 0;
        left: 0 !important;
        position: absolute;
        transition: all ease .3s;
        /*display: none;*/
        opacity: 0;
    }

    .product-item:hover .overlay-pd {
        /*display: block;*/
        opacity: 1;
        transition: all 0.5s ease-in;
        box-shadow: 11px 11px 32px rgb(59 88 157 / 34%), -11px -11px 32px rgb(69 94 151 / 22%);
    }


    .list-links {
        font-weight: 500;
        color: #111;
    }

    .fw-sm {
        font-weight: 500;
    }

    .list-links:hover {
        color: #555;
    }

    .list-links.active {
        color: var(--primary);
    }

    .sm-shadow {
        box-shadow: 0 0 10px #0000002f;
    }

    .md-shadow {
        box-shadow: 0 0 10px #00000044;
    }

    .ico {
        width: 22px;
    }

    .coin-ico {
        width: 25px;
    }

    .payment {
        padding: 3.5% 0;
    }

    .buttons button {
        padding: 10px 30px;
        transition: all .3s;
    }

    .select button:hover {
        background-color: #eee !important;
    }

    .delete button:hover {
        background-color: #1b4897cf !important;
    }

    .time {
        position: absolute;
        bottom: 15px;
        right: 15px;
    }

    /* Profile Image */
    .profile-image-outer-container {
        margin-top: auto;
        margin-bottom: auto;
        border-radius: 50%;
        position: relative;
        cursor: pointer;
    }

    .profile-image-outer-container .profile-image-input {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        z-index: 3;
        cursor: pointer;
    }

    .profile-image-outer-container .profile-image-inner-container {
        border-radius: 50%;
        padding: 5px;
    }

    .profile-image-outer-container .profile-image-inner-container img {
        height: 200px;
        width: 200px;
        border-radius: 50%;
        object-fit: contain;
        border: 5px solid white;
    }

    .profile-image-outer-container .profile-image-inner-container .profile-image-button {
        position: absolute;
        z-index: 2;
        bottom: 15px;
        right: 15px;
        width: 40px;
        height: 40px;
        text-align: center;
        border-radius: 50%;
        line-height: 38px;
        transition: ease all 0.1s;
    }

    .profile-image-outer-container:hover .profile-image-button {
        transform: scale(1.1);
    }

    .counter-box .icon img {
        object-fit: cover !important;
    }

    .desktop .custom-Dropdown {
        top: 50px !important;
    }

    .desktop .User-Dropdown > li:before, .custom-Dropdown > li:before {
        margin-top: -6px;
    }

    .desktop .custom-Dropdown li {
        margin: .5rem 0;
    }

    .mobile-nav .User-Dropdown > li:before, .custom-Dropdown > li:before {
        margin-top: 11px;
    }

    #style-1::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        /*border-radius: px;*/
        background-color: #F5F5F5;
    }

    #style-1::-webkit-scrollbar {
        width: 5px;
        background-color: #F5F5F5;
    }


    #style-1::-webkit-scrollbar-thumb {
        /*border-radius: 10px;*/
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
        background-color: #38c4ca !important;
    }







    /*again*/

    .under{
        background-color: #f3f3f3;
    }
    .decoration {
        display: flex;
        justify-content: center;
        margin-top: 5px;
        overflow: hidden;
        height: 3px;
    }
    .line {
        display: inline-block;
        width: 132px;
        height: 3px;
        border-bottom: 2px dashed #f3f3f3;
        position: absolute;
        top: 12px !important;
        /*background: url(https://vipon.s3.amazonaws.com/img/588869b….png) 0 -38px no-repeat;*/
    }
    .ball {
        width: 126%;
        display: flex;
        justify-content: space-between;
        position: absolute;
        top: 0;
        left: -13%;
        z-index: 20;

    }
    .ball div {
        width: 30px;
        height: 30px;
        background-color: #f3f3f3;
        border-radius: 30px;
    }


    @media (max-width: 768px){
        .ball {
            width: 120%;
            left: -10%;
        }
    }

</style>

