# Hammer _for Laravel Forge_

## Introduction

This is a CLI tool for your [Forge](forge.laravel.com) servers. 
It is heavily inspired by [forge-connect](https://github.com/LKDevelopment/forge-connect) and uses [Blacksmith](https://github.com/mpociot/blacksmith) to connect to [Forge](forge.laravel.com)

## Installation

```
composer global require nckg/hammer
```

Than you want to set your Forge credentials.

```
hammer register [e-mail] [password]
```

## Available commands

Save your Forge credentials.

```
hammer register [e-mail] [password]
```

Returns a list of your servers.

```
hammer list:servers
```

Returns a list of your sites on a given server.

```
hammer list:sites [server_id]
```


Deploy a site.

```
hammer site:deploy [site_id]
```

## License

Hammer is free software distributed under the terms of the MIT license.
