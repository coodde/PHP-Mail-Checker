<img src="images/header.jpg" alt="header">

<a id="readme-top"></a>

<!-- PROJECT SHIELDS -->
<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
-->
[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]
[![LinkedIn][linkedin-shield]][linkedin-url]



<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="https://coodde.com">
    <img src="images/logo.png" alt="Logo" width="80" height="80">
  </a>

  <h2 align="center">PHP Mail Checker</h2>

  <p align="center">
    This package provides simple checker for emails, to validate mail providers.
    <br />
    <br />
    <a href="https://github.com/coodde/PHP-Mail-Checker/issues/new?labels=bug&template=bug-report---.md">Report Bug</a>
    ·
    <a href="https://github.com/coodde/PHP-Mail-Checker/issues/new?labels=enhancement&template=feature-request---.md">Request Feature</a>
  </p>
</div>



<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Package</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#requires">Requires</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

Flexible and simple library for checking email addresses. Usual framework validators are usually checking email correctness, but this library is implementing other kind of validation.

It can check is mail:
* registered in mail provider from forbidden country;
* registered in forbidden domain (all possible levels);
* used for spam or scam (dangerous), temporary, had suspicious behaviour, is registered on paid or public (like gmail) mail provider.

Of course, you can always propose new domains to add into listed in the "data" directory.

Key feautures:
* fast search - binary search in the pre-sorted dictionaries (in comparison with other popular libraries with linear search)
* flexible configurations - not only one strict list
* low memory usage - disctionaries are not loaded fully into memory (as in other popular libraries)
* frequent updates
* easy collaboration
* large disctionary- 60k+ of domains (not only public email providers) in the dictionary

<p align="right">(<a href="#readme-top">back to top</a>)</p>



### Built With

This library supports several languages and frameworks.

* PHP
  * Vanilla
  * [![Laravel][Laravel.com]][Laravel-url]
  * Symfony (planned)
  * Phalcon (planned)
* JS / TS
  * Vanilla (planned)
  * [![Next][Next.js]][Next-url] (planned)
  * [![React][React.js]][React-url] (planned)
  * [![Vue][Vue.js]][Vue-url] (planned)
  * [![Angular][Angular.io]][Angular-url] (planned)
  * [![Svelte][Svelte.dev]][Svelte-url] (planned)
* Ruby
  * Ruby on Rails (planned)
* Perl
  * Vanilla (planned)

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- GETTING STARTED -->
## Getting Started

Simple steps to start use the library.


### Requires

Check that library works on your PHP version:

* PHP 8.0+
* Composer


### Installation

_Below is an simple list of step to install library._

1. Open your project directory in the terminal
2. Install package
```bash
composer require coodde/mail-checker
```
3. Check your `composer.json` file

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- USAGE EXAMPLES -->
## Usage

This table will help to understand possible usage of library and all default values:

| Parameter | Default Value | Possible Values | Description |
| --- | --- | --- | --- |
| categories | [MailChecker::CATEGORY_DANGEROUS] | MailChecker::CATEGORY_PUBLIC<br/>MailChecker::CATEGORY_PAID<br/>MailChecker::CATEGORY_TEMPORARY<br/>MailChecker::CATEGORY_SUSPICIOUS<br/>MailChecker::CATEGORY_DANGEROUS | For more comfortable usage all mail providers are split into several lists |
| domains | [] | * | Any kind of domains, starting by top level domains like "com" or "net", and finishing by exact domains like "mail.ru" |
| regions | [ MailChecker::RUSSIA, MailChecker::BELARUS, MailChecker::NORTH_KOREA, MailChecker::AFGHANISTAN, MailChecker::IRAN, MailChecker::SYRIA, MailChecker::SOVIET_UNION, MailChecker::CUBA ] | MailChecker::ASCENSION_ISLAND<br/>MailChecker::ANDORRA<br/>MailChecker::UNITED_ARAB_EMIRATES<br/>MailChecker::UAE<br/>MailChecker::AFGHANISTAN<br/>MailChecker::ANTIGUA_AND_BARBUDA<br/>MailChecker::ANGUILLA<br/>MailChecker::ALBANIA<br/>MailChecker::ARMENIA<br/>MailChecker::ANGOLA<br/>MailChecker::ANTARCTICA<br/>MailChecker::ARGENTINA<br/>MailChecker::AMERICAN_SAMOA<br/>MailChecker::AUSTRIA<br/>MailChecker::AUSTRALIA<br/>MailChecker::ARUBA<br/>MailChecker::ALAND<br/>MailChecker::AZERBAIJAN<br/>MailChecker::BOSNIA_AND_HERZEGOVINA<br/>MailChecker::BARBADOS<br/>MailChecker::BANGLADESH<br/>MailChecker::BELGIUM<br/>MailChecker::BURKINA_FASO<br/>MailChecker::BULGARIA<br/>MailChecker::BAHRAIN<br/>MailChecker::BURUNDI<br/>MailChecker::BENIN<br/>MailChecker::BERMUDA<br/>MailChecker::BRUNEI<br/>MailChecker::BOLIVIA<br/>MailChecker::CARIBBEAN_NETHERLANDS<br/>MailChecker::BRAZIL<br/>MailChecker::BAHAMAS<br/>MailChecker::BHUTAN<br/>MailChecker::BOTSWANA<br/>MailChecker::BELARUS<br/>MailChecker::BELIZE<br/>MailChecker::CANADA<br/>MailChecker::COCOS_ISLANDS<br/>MailChecker::DEMOCRATIC_REPUBLIC_OF_THE_CONGO<br/>MailChecker::CENTRAL_AFRICAN_REPUBLIC<br/>MailChecker::REPUBLIC_OF_THE_CONGO<br/>MailChecker::SWITZERLAND<br/>MailChecker::IVORY_COAST<br/>MailChecker::COOK_ISLANDS<br/>MailChecker::CHILE<br/>MailChecker::CAMEROON<br/>MailChecker::CHINA<br/>MailChecker::COLOMBIA<br/>MailChecker::COSTA_RICA<br/>MailChecker::CUBA<br/>MailChecker::CAPE_VERDE<br/>MailChecker::CURACAO<br/>MailChecker::CHRISTMAS_ISLAND<br/>MailChecker::CYPRUS<br/>MailChecker::CZECH_REPUBLIC<br/>MailChecker::GERMANY<br/>MailChecker::DJIBOUTI<br/>MailChecker::DENMARK<br/>MailChecker::DOMINICA<br/>MailChecker::DOMINICAN_REPUBLIC<br/>MailChecker::ALGERIA<br/>MailChecker::ECUADOR<br/>MailChecker::ESTONIA<br/>MailChecker::EGYPT<br/>MailChecker::WESTERN_SAHARA<br/>MailChecker::ERITREA<br/>MailChecker::SPAIN<br/>MailChecker::ETHIOPIA<br/>MailChecker::EUROPEAN_UNION<br/>MailChecker::FINLAND<br/>MailChecker::FIJI<br/>MailChecker::FALKLAND_ISLANDS<br/>MailChecker::FEDERATED_STATES_OF_MICRONESIA<br/>MailChecker::FAROE_ISLANDS<br/>MailChecker::FRANCE<br/>MailChecker::GABON<br/>MailChecker::GRENADA<br/>MailChecker::GEORGIA<br/>MailChecker::FRENCH_GUIANA<br/>MailChecker::GUERNSEY<br/>MailChecker::GHANA<br/>MailChecker::GIBRALTAR<br/>MailChecker::GREENLAND<br/>MailChecker::THE_GAMBIA<br/>MailChecker::GUINEA<br/>MailChecker::GUADELOUPE<br/>MailChecker::EQUATORIAL_GUINEA<br/>MailChecker::GREECE<br/>MailChecker::SOUTH_GEORGIA_AND_THE_SOUTH_SANDWICH_ISLANDS<br/>MailChecker::GUATEMALA<br/>MailChecker::GUAM<br/>MailChecker::GUINEA_BISSAU<br/>MailChecker::GUYANA<br/>MailChecker::HONG_KONG<br/>MailChecker::HEARD_ISLAND_AND_MCDONALD_ISLANDS<br/>MailChecker::HONDURAS<br/>MailChecker::CROATIA<br/>MailChecker::HAITI<br/>MailChecker::HUNGARY<br/>MailChecker::INDONESIA<br/>MailChecker::IRELAND<br/>MailChecker::ISRAEL<br/>MailChecker::ISLE_OF_MAN<br/>MailChecker::INDIA<br/>MailChecker::BRITISH_INDIAN_OCEAN_TERRITORY<br/>MailChecker::IRAQ<br/>MailChecker::IRAN<br/>MailChecker::ICELAND<br/>MailChecker::ITALY<br/>MailChecker::JERSEY<br/>MailChecker::JAMAICA<br/>MailChecker::JORDAN<br/>MailChecker::JAPAN<br/>MailChecker::KENYA<br/>MailChecker::KYRGYZSTAN<br/>MailChecker::CAMBODIA<br/>MailChecker::KIRIBATI<br/>MailChecker::COMOROS<br/>MailChecker::SAINT_KITTS_AND_NEVIS<br/>MailChecker::NORTH_KOREA<br/>MailChecker::SOUTH_KOREA<br/>MailChecker::KUWAIT<br/>MailChecker::CAYMAN_ISLANDS<br/>MailChecker::KAZAKHSTAN<br/>MailChecker::LAOS<br/>MailChecker::LEBANON<br/>MailChecker::SAINT_LUCIA<br/>MailChecker::LIECHTENSTEIN<br/>MailChecker::SRI_LANKA<br/>MailChecker::LIBERIA<br/>MailChecker::LESOTHO<br/>MailChecker::LITHUANIA<br/>MailChecker::LUXEMBOURG<br/>MailChecker::LATVIA<br/>MailChecker::LIBYA<br/>MailChecker::MOROCCO<br/>MailChecker::MONACO<br/>MailChecker::MOLDOVA<br/>MailChecker::MONTENEGRO<br/>MailChecker::MADAGASCAR<br/>MailChecker::MARSHALL_ISLANDS<br/>MailChecker::NORTH_MACEDONIA<br/>MailChecker::MALI<br/>MailChecker::MYANMAR<br/>MailChecker::MONGOLIA<br/>MailChecker::MACAU<br/>MailChecker::NORTHERN_MARIANA_ISLANDS<br/>MailChecker::MARTINIQUE<br/>MailChecker::MAURITANIA<br/>MailChecker::MONTSERRAT<br/>MailChecker::MALTA<br/>MailChecker::MAURITIUS<br/>MailChecker::MALDIVES<br/>MailChecker::MALAWI<br/>MailChecker::MEXICO<br/>MailChecker::MALAYSIA<br/>MailChecker::MOZAMBIQUE<br/>MailChecker::NAMIBIA<br/>MailChecker::NEW_CALEDONIA<br/>MailChecker::NIGER<br/>MailChecker::NORFOLK_ISLAND<br/>MailChecker::NIGERIA<br/>MailChecker::NICARAGUA<br/>MailChecker::NETHERLANDS<br/>MailChecker::NORWAY<br/>MailChecker::NEPAL<br/>MailChecker::NAURU<br/>MailChecker::NIUE<br/>MailChecker::NEW_ZEALAND<br/>MailChecker::OMAN<br/>MailChecker::PANAMA<br/>MailChecker::PERU<br/>MailChecker::FRENCH_POLYNESIA<br/>MailChecker::PAPUA_NEW_GUINEA<br/>MailChecker::PHILIPPINES<br/>MailChecker::PAKISTAN<br/>MailChecker::POLAND<br/>MailChecker::SAINT_PIERRE_AND_MIQUELON<br/>MailChecker::PITCAIRN_ISLANDS<br/>MailChecker::PUERTO_RICO<br/>MailChecker::PALESTINE<br/>MailChecker::PORTUGAL<br/>MailChecker::PALAU<br/>MailChecker::PARAGUAY<br/>MailChecker::QATAR<br/>MailChecker::RÉUNION<br/>MailChecker::ROMANIA<br/>MailChecker::SERBIA<br/>MailChecker::RUSSIA<br/>MailChecker::RWANDA<br/>MailChecker::SAUDI_ARABIA<br/>MailChecker::SOLOMON_ISLANDS<br/>MailChecker::SEYCHELLES<br/>MailChecker::SUDAN<br/>MailChecker::SWEDEN<br/>MailChecker::SINGAPORE<br/>MailChecker::SAINT_HELENA_ASCENSION_AND_TRISTAN_DA_CUNHA<br/>MailChecker::SAINT_HELENA<br/>MailChecker::SLOVENIA<br/>MailChecker::SLOVAKIA<br/>MailChecker::SIERRA_LEONE<br/>MailChecker::SAN_MARINO<br/>MailChecker::SENEGAL<br/>MailChecker::SOMALIA<br/>MailChecker::SURINAME<br/>MailChecker::SOUTH_SUDAN<br/>MailChecker::SAO_TOME_AND_PRINCIPE<br/>MailChecker::SOVIET_UNION<br/>MailChecker::EL_SALVADOR<br/>MailChecker::SINT_MAARTEN<br/>MailChecker::SYRIA<br/>MailChecker::ESWATINI<br/>MailChecker::TURKS_AND_CAICOS_ISLANDS<br/>MailChecker::CHAD<br/>MailChecker::FRENCH_SOUTHERN_AND_ANTARCTIC_LANDS<br/>MailChecker::TOGO<br/>MailChecker::THAILAND<br/>MailChecker::TAJIKISTAN<br/>MailChecker::TOKELAU<br/>MailChecker::EAST_TIMOR<br/>MailChecker::TURKMENISTAN<br/>MailChecker::TUNISIA<br/>MailChecker::TONGA<br/>MailChecker::TURKEY<br/>MailChecker::TRINIDAD_AND_TOBAGO<br/>MailChecker::TUVALU<br/>MailChecker::TAIWAN<br/>MailChecker::TANZANIA<br/>MailChecker::UKRAINE<br/>MailChecker::UGANDA<br/>MailChecker::UNITED_KINGDOM<br/>MailChecker::UNITED_STATES_OF_AMERICA<br/>MailChecker::USA<br/>MailChecker::URUGUAY<br/>MailChecker::UZBEKISTAN<br/>MailChecker::VATICAN_CITY<br/>MailChecker::SAINT_VINCENT_AND_THE_GRENADINES<br/>MailChecker::VENEZUELA<br/>MailChecker::BRITISH_VIRGIN_ISLANDS<br/>MailChecker::UNITED_STATES_VIRGIN_ISLANDS<br/>MailChecker::VIETNAM<br/>MailChecker::VANUATU<br/>MailChecker::WALLIS_AND_FUTUNA<br/>MailChecker::SAMOA<br/>MailChecker::YEMEN<br/>MailChecker::MAYOTTE<br/>MailChecker::SOUTH_AFRICA<br/>MailChecker::ZAMBIA<br/>MailChecker::ZIMBABWE | Recommended to use constants for easier code maintenance |


Here you will find different cases of usage.

Checking that mail address registered in Russian mail provider:
```php
use Coodde\MailChecker\MailChecker;
use Coodde\MailChecker\Regions;
use Coodde\MailChecker\Exceptions\MailCheckException;
use Coodde\MailChecker\Exceptions\RegionMailCheckException;

$mailChecker = new MailChecker([], [], [Regions::RUSSIA]);

// This will return boolean value
$result = $mailChecker->allowed('test@gmail.com');
// or
$result = $mailChecker->forbidden('test@mail.ru');

// Also you can catch exception
try {
  $mailChecker->validate('test@mail.ru');
} catch (RegionMailCheckException $e) {
  echo "Forbidden region";
} catch (MailCheckException $e) {
  echo "Wrong mail format (not validated before checking)";
} catch (\Exception $e) {
  echo "Unhandled exception";
}
```

Checking that mail address registered in "ru" or "mail.by" domains:
```php
use Coodde\MailChecker\MailChecker;
use Coodde\MailChecker\Regions;
use Coodde\MailChecker\Exceptions\MailCheckException;
use Coodde\MailChecker\Exceptions\DomainMailCheckException;
use Coodde\MailChecker\Exceptions\ListingMailCheckException;
use Coodde\MailChecker\Exceptions\RegionMailCheckException;

$mailChecker = new MailChecker([], ['ru', 'mail.by'], []);

// This will return boolean value
$result = $mailChecker->allowed('test@gmail.com');
// or
$result = $mailChecker->forbidden('test@test.ru');
$result = $mailChecker->forbidden('test@mail.by');

// Also you can catch exception
try {
  $mailChecker->validate('test@mail.ru');
} catch (DomainMailCheckException $e) {
  echo "Forbidden domain";
} catch (MailCheckException $e) {
  echo "Wrong mail format (not validated before checking)";
} catch (\Exception $e) {
  echo "Unhandled exception";
}
```

Checking that mail address is placed in dangerous or suspicious lists:
```php
use Coodde\MailChecker\MailChecker;
use Coodde\MailChecker\Regions;
use Coodde\MailChecker\Exceptions\MailCheckException;
use Coodde\MailChecker\Exceptions\ListingMailCheckException;

$mailChecker = new MailChecker([MailChecker::CATEGORY_DANGEROUS, MailChecker::CATEGORY_SUSPICIOUS], [], []);

// This will return boolean value
$result = $mailChecker->allowed('test@gmail.com');
// or
$result = $mailChecker->forbidden('test@gmail.ru');

// Also you can catch exception
try {
  $mailChecker->validate('test@gmail.ru');
} catch (ListingMailCheckException $e) {
  echo "Dangerous mail provider";
} catch (MailCheckException $e) {
  echo "Wrong mail format (not validated before checking)";
} catch (\Exception $e) {
  echo "Unhandled exception";
}
```

Alternative way to configure restrictions:
```php
$mailChecker = new MailChecker();

// Forbid countries
$mailChecker->forbidRegions([Regions::RUSSIA]);

// Forbid categories
$mailChecker->forbidCategories([
  MailChecker::CATEGORY_PAID,
  MailChecker::CATEGORY_TEMPORARY,
]);

// Forbid domains
$mailChecker->forbidDomains(['mail.ru']);
```

_Of course you can combine restrictioned domains, countries, and categories_

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- ROADMAP -->
## Roadmap

- [x] Checking by countries
- [x] Checking by domains
- [ ] Prepared lists
    - [x] Paid - mail providers with non-free subscription
    - [x] Dangerous - usually spaming servers / domains
    - [x] Public - popular free services like gmail, outlook, etc
    - [ ] Temporary - services for mails which will be removed soon after creation
- [ ] Checking by prepaired lists
    - [x] From files - it uses binary search without file content buffering
    - [ ] From cache - cache files with lists compiled into php file
    - [ ] From memory - storing lists in memcache
    - [ ] From database - by using PDO library+

See the [open issues](https://github.com/coodde/PHP-Mail-Checker/issues) for a full list of proposed features (and known issues).

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request


✅ Run refactors using **Rector**
```bash
composer refacto
```

⚗️ Run static analysis using **PHPStan**:
```bash
composer test:types
```

✅ Run unit tests using **PEST**
```bash
composer test:unit
```

🚀 Run the entire test suite:
```bash
composer test
```

### Top contributors:

<a href="https://github.com/coodde/PHP-Mail-Checker/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=coodde/PHP-Mail-Checker" alt="contrib.rocks image" />
</a>

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE.txt` for more information.

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- CONTACT -->
## Contact

Svyatoslav Ryzhok - info@coodde.com

Platform Link: [https://coodde.com](https://coodde.com)

<p align="right">(<a href="#readme-top">back to top</a>)</p>


<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/coodde/PHP-Mail-Checker.svg?style=for-the-badge
[contributors-url]: https://github.com/coodde/PHP-Mail-Checker/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/coodde/PHP-Mail-Checker.svg?style=for-the-badge
[forks-url]: https://github.com/coodde/PHP-Mail-Checker/network/members
[stars-shield]: https://img.shields.io/github/stars/coodde/PHP-Mail-Checker.svg?style=for-the-badge
[stars-url]: https://github.com/coodde/PHP-Mail-Checker/stargazers
[issues-shield]: https://img.shields.io/github/issues/coodde/PHP-Mail-Checker.svg?style=for-the-badge
[issues-url]: https://github.com/coodde/PHP-Mail-Checker/issues
[license-shield]: https://img.shields.io/github/license/coodde/PHP-Mail-Checker.svg?style=for-the-badge
[license-url]: https://github.com/coodde/PHP-Mail-Checker/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://www.linkedin.com/groups/12553924/
[product-screenshot]: images/screenshot.png
[Next.js]: https://img.shields.io/badge/next.js-000000?style=for-the-badge&logo=nextdotjs&logoColor=white
[Next-url]: https://nextjs.org/
[React.js]: https://img.shields.io/badge/React-20232A?style=for-the-badge&logo=react&logoColor=61DAFB
[React-url]: https://reactjs.org/
[Vue.js]: https://img.shields.io/badge/Vue.js-35495E?style=for-the-badge&logo=vuedotjs&logoColor=4FC08D
[Vue-url]: https://vuejs.org/
[Angular.io]: https://img.shields.io/badge/Angular-DD0031?style=for-the-badge&logo=angular&logoColor=white
[Angular-url]: https://angular.io/
[Svelte.dev]: https://img.shields.io/badge/Svelte-4A4A55?style=for-the-badge&logo=svelte&logoColor=FF3E00
[Svelte-url]: https://svelte.dev/
[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://github.com/coodde/Laravel-Email-Checker
[Bootstrap.com]: https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white
[Bootstrap-url]: https://getbootstrap.com
[JQuery.com]: https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white
[JQuery-url]: https://jquery.com 
