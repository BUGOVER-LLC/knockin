/** @format */

import BaseApi from './../AuthApiBase';

const SEND_EMAIL_PATH: string = '/auth/started/check-email';
const SEND_CODE_PATH: string = '/auth/started/check-code';
const GET_WORKSPACES: string = '/auth/started/workspaces';

export const SendEmailAuth = async (email: string) => {
    const res = await BaseApi.post(SEND_EMAIL_PATH, { email });
    return res?.data;
};

export const SendCodeAuth = async (code: string, email: string) => {
    const res = await BaseApi.post(SEND_CODE_PATH, { email, code });
    return res?.data;
};

export const getWorkspaces = async () => {
    const res = await BaseApi.get(GET_WORKSPACES);
    return res?.data;
};
