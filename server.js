require('dotenv').config();

const env = process.env;

require('laravel-echo-server').run({
    authHost: "http://multisite.loc/",
    devMode: true,
    database: "redis",
    databaseConfig: {
        redis: {
            host: "localhost",
            port: 6379,
        }
    }
});