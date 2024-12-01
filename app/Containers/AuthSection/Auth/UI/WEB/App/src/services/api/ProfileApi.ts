/** @format */

import BaseApi from '@/services/BaseApi';
import { ProfileModel } from '@/store/models/ProfileModel';

const PROFILE_ENDPOINT: string = '/producer/profile';
const PROFILE_UPDATE_ENDPOINT: string = '/producer/profile/update';

export const UpdateProfile = async (profile: ProfileModel): Promise<ProfileModel> => {
    const res = await BaseApi.put(`${PROFILE_UPDATE_ENDPOINT}/${profile.producerId}`, profile);

    return res?.data;
};

export const Profile = async (): Promise<ProfileModel> => {
    const res = await BaseApi.get(`${PROFILE_ENDPOINT}`);

    return res?.data;
};
