/** @format */

import BaseApi from './../AuthApiBase';

const GET_WORKSPACE_URL = '/auth/started/workspaces';

export const GetWorkspaces = async () => {
    const res = await BaseApi.get(GET_WORKSPACE_URL);
    return res?.data;
};
