
# Documentary ListView

A web app that will keep track of all the documentaries I have seen


## Badges

Add badges from somewhere like [shields.io](https://shields.io/)

[![GPLv3 License](https://img.shields.io/badge/License-GPL%20v3-yellow.svg)](https://opensource.org/licenses/)
[![AGPL License](https://img.shields.io/badge/license-AGPL-blue.svg)](http://www.gnu.org/licenses/agpl-3.0)


## Authors

- [@samnoon1971](https://www.github.com/samnoon1971)


## Tech Stack

**Frontend:** React, Javascript, SCSS

**Database:** PostgreSQL

**Server:** PHP, Laravel


## Contributing

Contributions are always welcome!

See `contributing.md` for ways to get started.

Please adhere to this project's `code of conduct`.


## Deployment (App and DB Services - Multi Container)


To deploy this project with `docker-compose`  run

```bash
docker-compose up --build
```


## Deployment (DB Container and App on hostmachine)


To setup database, follow this steps,

Pull latest Postgresql docker image:

```bash
docker pull postgres
```


Run container with password (e.g. here it's 12345):



```bash
docker run -d --name my_pgsql -e POSTGRES_PASSWORD=12345 --network host --restart always postgres:latest
```

Setup Database tables using following commands:

```bash
php artisan migrate
php artisan db:seed
```

Now, run following commands to run App on your hostmachine:

```bash
php artisan serve
```


## Run Unit Tests

Use following command,

```bash
php artisan test
```
## Environment Variables

To run this project, you will need to add some environment variables to your .env file, see .env.example file for reference.



## Documentation

(will be added in future)



## Feedback

If you have any feedback, please reach out to us at samnoonabrar@gmail.com


## Roadmap

- Additional browser support

- Add more integrations

- Add documentation

- Add Unit Tests

- Add UI Tests

- Add E2E Tests


## Support

For support, email samnoonabrar@gmail.com or join our Slack channel.


## FAQ

#### Can I use it for commercial use?

Yes
