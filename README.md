# EMA - Entity Model Abstraction

#### Description
EMA is a highly flexible model for DotKernel1. 

Its purpose is to demonstrate concepts without the burden of
creating the whole model for each entity.

Only use this project in controlled environment and for
demonstration purpose only.

The code was written as much as possible complying to `PSR-2`
coding standard.

`PSR-7` was not used in this project but it would help a
lot.

# DO NOT USE IN PRODUCTION

## Tasks
* ~~Create bootstrap~~
* ~~Create separate config for EMA~~
* Add filter and Validation Support
* Improve Request-Response representations

## Usage

### Configuration

Populate the `/library/Ema/ConfigProvider.php` with the allowed entities and methods.


### Auto-detect Request Method

Entity:
`http://localhost/ema/Api/?key=_dev_&action=ema&id=6`

Collection:
`http://localhost/ema/Api/?key=_dev_&action=ema&dev_`


### Manually define method

Entity:
`http://localhost/ema/Api/?key=_dev_&action=get`

Collection:
`http://localhost/ema/Api/?key=_dev_&action=getCollection`

