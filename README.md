# Software Requirements Specification
## For WrathWorks MVC

Version 0.1  
Prepared by Christopher Ciampoli  
SDPRO DEV
Feb 2021

Table of Contents
=================
* [Revision History](#revision-history)
* 1 [Introduction](#1-introduction)
    * 1.1 [Document Purpose](#11-document-purpose)
    * 1.2 [Product Scope](#12-product-scope)
    * 1.3 [Definitions, Acronyms and Abbreviations](#13-definitions-acronyms-and-abbreviations)
    * 1.4 [References](#14-references)
    * 1.5 [Document Overview](#15-document-overview)
* 2 [Product Overview](#2-product-overview)

## Revision History
| Name | Date    | Reason For Changes  | Version   |
| ---- | ------- | ------------------- | --------- |
| Dev  | Jan 21  | Initial             | 0.1       |

## 1. Introduction
This SRS was written to give the reader an at a glance overview
of the WrathTools CMS project by SDPRO DEV

### 1.1 Document Purpose
The intended audience is any business staff, implementation team member, or customer looking to
gain an understanding of both how the system is built, and the services it provides.

### 1.2 Product Scope
Custom built MVC framework to provide a smaller jump off base for projects that are either not in need of a full Symfony
build, or looking to bring legacy code to a new framework.  Using PHP8, and Symfony packages with composer. View layer
will be done using Twig with ReactJS, and computed styles. We will be using BDD for testing of the backend PHP code,
and React Testing Package for the front.  Deploying to AWS using Circle CI. Datalayer will be using Doctrine for ORM,
and MySQL for the database.

### 1.3 Definitions, Acronyms and Abbreviations
* MVC - Model View Controller Pattern
* CI/CD - Continuous Intergration - Continous Deployment
* BDD - Behaviour Driven Development
    * Behat - BDD Testing Framework
* Composer - PHP package manager
* Symfony - PHP MVC Framework modular
* ReactJS - Framework for Javascript

### 1.4 References
List any other documents or Web addresses to which this SRS refers. These may include user interface style guides, contracts, standards, system requirements specifications, use case documents, or a vision and scope document. Provide enough information so that the reader could access a copy of each reference, including title, author, version number, date, and source or location.

- Backend
    * Symfony:  https://symfony.com/doc/current/index.html
    * PHP 8
    * Behat:    https://docs.behat.org/en/latest/quick_start.html
        * PHPUNIT latest for framework itself tests currently
    * Circle:   CI/CD https://circleci.com/docs/2.0/about-circleci/
    * Composer: https://getcomposer.org/doc/01-basic-usage.md

- Javascript
    * ReactJS:  https://reactjs.org/docs/getting-started.html
    * Jest:     https://jestjs.io/docs/en/getting-started
    * Cypress:  https://www.cypress.io/
    * Webpack:  https://symfony.com/components/Webpack%20Encore
    * NPM:

- View Engine:
    * Twig

### 1.5 Document Overview
Describe what the rest of the document contains and how it is organized.

## 2. Product Overview
This project was made to help code teams in the process of porting from an older framework to a new one.  
Built on Symfony components, using Doctrine to talk to the MySQL backend. We are also using the Container package
which is a DI container, to allow for injection.  We will be setting up autowiring as well.