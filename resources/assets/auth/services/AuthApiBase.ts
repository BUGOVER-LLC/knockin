/** @format */

import axios, { AxiosInstance, AxiosResponse } from 'axios';

import HttpStatusCodes from '@/auth/services/common/HttpStatusCodes';
import { transformErrors } from '@/auth/services/Utils';

const OnResponseSuccess = (response: AxiosResponse<any>): AxiosResponse<any> => response;

const OnResponseFailure = (error: any): Promise<any> => {
    const httpStatus = error?.response?.status;

    const errors = transformErrors(error?.response?.data?.errors);
    const isUnknownError = errors?.[0].startsWith('Unknown');

    switch (httpStatus) {
        case HttpStatusCodes.NOT_FOUND:
            // notifyErrors(0 < errors?.length && !isUnknownError ? errors : ['Requested resource was not found.']);
            break;
        case HttpStatusCodes.FORBIDDEN:
            // notifyErrors(0 < errors?.length && !isUnknownError ? errors : ['Access to this resource is forbidden']);
            break;
        case HttpStatusCodes.UNPROCESSABLE_ENTITY:
            break;
        default:
            // notifyErrors(0 < errors?.length ? errors : ['Unknown error occurred, please try again later.']);
            break;
    }
    return Promise.reject(errors);
};

const instance: Readonly<AxiosInstance> = axios.create({
    baseURL: process.env.APP_URL,
    timeout: 5000,
});

instance.defaults.headers.get.Accepts = 'application/json';
instance.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
instance.interceptors.response.use(OnResponseSuccess, OnResponseFailure);

export default instance;
