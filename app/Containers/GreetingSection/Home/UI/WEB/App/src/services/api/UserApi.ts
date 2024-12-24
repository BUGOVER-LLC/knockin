/** @format */

import BaseApi from '@/services/BaseApi';

const USER_BY_PSN_ENDPOINT: string = '/umac/user/info';

export const GetUserInfoByPSN = async (psn: number) => {
    const res = await BaseApi.get(`${USER_BY_PSN_ENDPOINT}/${psn}`);

    return res?.data;
};
