# Exercise about solve implementation of a Receipt with taxes and import duty.
[![GitHub](https://img.shields.io/github/license/critterbots/lmcom-test.svg)](https://opensource.org/licenses/Apache-2.0)
[![Build Status](https://travis-ci.org/critterbots/lmcom-test.svg?branch=master)](https://travis-ci.org/critterbots/lmcom-test)
[![Quality Gate Status](https://sonarcloud.io/api/project_badges/measure?project=critterbots_lmcom-test&metric=alert_status)](https://sonarcloud.io/dashboard?id=critterbots_lmcom-test)
[![Maintainability Rating](https://sonarcloud.io/api/project_badges/measure?project=critterbots_lmcom-test&metric=sqale_rating)](https://sonarcloud.io/dashboard?id=critterbots_lmcom-test&metric=Maintainability)
[![Reliability Rating](https://sonarcloud.io/api/project_badges/measure?project=critterbots_lmcom-test&metric=reliability_rating)](https://sonarcloud.io/dashboard?id=critterbots_lmcom-test&metric=Reliability)
[![Security Rating](https://sonarcloud.io/api/project_badges/measure?project=critterbots_lmcom-test&metric=security_rating)](https://sonarcloud.io/dashboard?id=critterbots_lmcom-test&metric=Security)

## Objective
This exercise shows how to solve the expedition of a Sales Taxes Receipt without use any kind of framework.

## Solution 1
This is the fastest implementation of the problem.
In case a quick solution is required, designed directly to solve the requested problem, this works well.

Main features:
* Applies only sequential and structured coding techniques.
* This solution does not have the ability to be tested with the test libraries.
* This solution should not to be used for production purposes because it does not have a reliable control flow.
* As we can not perform a set of tests, we can not ensure 100% of your achievements.

## Solution 2
This solution is OOP and TDD and is a bit more complex than the previous one.
It could be a first approach to a production solution, testable, but limited to be scaled.

Main features:
* Applies OOP techniques, introducing namespaces and classes.
* Applies TDD techniques, allowing the ability to be tested and verified, and we can ensure that it works well for know cases (specific cases or defined by rules).
* This solution should be used for production purposes in small pieces of software where the scalability or the interconectivity is not a priority.

## Solution 3
This solution os the most robust. Thinking about OOP, DDD and TDD, this solution have a high level of scalability,
connectivity and readability. She can run in large implementations and the opportunity to increase features and behaviors
is inherent to their architecture.

Main features:
* Applies OOP techniques, introducing namespaces, classes and interfaces.
* Applies DDD techniques that divides the development between entities, use cases and infrastructure. This concept allows
to separate the data internal representation (in the code, the entities), from I/O actions (infrastructure), and encapsulates
use cases in domain classes.
* Applies TDD techniques, allowing the ability to be tested and verified. As the logic is separated in different groups
(entities, domains, infrastructure), we can test separately everything and ensure their operation.
* This solution should be used for production purposes in large pieces of software where the scalability and
the interconectivity are a main priority. Also, can be distributed as a microservice, thanks to their I/O infrastructure (we need to arrange or create some additional classes specialized in the microservice I/O protocol).

## Execute sample code
You have two options to see this code in action:
* The first one, is to click here [![Build Status](https://travis-ci.org/critterbots/lmcom-test.svg?branch=master)](https://travis-ci.org/critterbots/lmcom-test) and go to Travis-CI. The log show the last execution of this code near to line 640, where he says '$ ./run-solution.sh'.
* The second, is to download an run the code in your machine. You need to have composer installed (to run PHPUnit test), and PHP 7.2 or higher. To run PHPUnit test and all tests you only need to execute the run-solution.sh Unix shell script.
In both cases you will give the output as shown in the Travis-CI log.
